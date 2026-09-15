<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PostalAreaResolver
{
    public function resolve(?string $postalCode, ?string $countryCode): string
    {
        $postalCode = trim((string) $postalCode);
        $countryCode = strtoupper(trim((string) $countryCode));

        if ($postalCode === '') {
            return 'Unknown';
        }

        $fallback = 'Postal area '.$postalCode;
        $cacheKey = 'postal-area:v4:'.sha1($countryCode.'|'.$postalCode);
        if ($cached = Cache::get($cacheKey)) {
            return $cached;
        }

        try {
            $query = [
                    'postalcode' => $postalCode,
                    'format' => 'jsonv2',
                    'addressdetails' => 1,
                    'limit' => 1,
                ];
            if (strlen($countryCode) === 2) {
                $query['countrycodes'] = strtolower($countryCode);
            } elseif ($countryCode !== '') {
                $query['country'] = $countryCode;
            }

            $response = Http::withHeaders([
                    'User-Agent' => config('analytics.nominatim_user_agent')
                        ?: 'AvrioGlobalAnalytics/1.0 (https://avrioglobal.io/contact)',
                    'Accept-Language' => 'en',
                ])->connectTimeout(3)->timeout(8)->retry(2, 1000)
                ->get(
                    config('analytics.nominatim_url') ?: 'https://nominatim.openstreetmap.org/search',
                    $query
                );

            if (! $response->successful()) {
                Log::warning('Postal area geocoding failed', [
                    'postal_code' => $postalCode,
                    'country_code' => $countryCode,
                    'status' => $response->status(),
                ]);
                return $fallback;
            }

            $address = data_get($response->json(), '0.address', []);
            foreach (['suburb', 'neighbourhood', 'quarter', 'town', 'city_district', 'village', 'municipality', 'county', 'city'] as $field) {
                if (! empty($address[$field])) {
                    Cache::put($cacheKey, $address[$field], now()->addDays(90));
                    return $address[$field];
                }
            }

            return $fallback;
        } catch (\Throwable $error) {
            Log::warning('Postal area geocoding request failed', [
                'postal_code' => $postalCode,
                'country_code' => $countryCode,
                'message' => $error->getMessage(),
            ]);
            return $fallback;
        }
    }

    public function fallback(?string $postalCode): string
    {
        $postalCode = trim((string) $postalCode);

        return $postalCode === '' ? 'Unknown' : 'Postal area '.$postalCode;
    }
}
