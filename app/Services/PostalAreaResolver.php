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
        $username = config('analytics.geonames_username');

        if (! $username) {
            return $fallback;
        }

        return Cache::remember(
            'postal-area:v2:'.sha1($countryCode.'|'.$postalCode),
            now()->addDays(90),
            function () use ($postalCode, $countryCode, $username, $fallback) {
                try {
                    $response = Http::connectTimeout(3)->timeout(8)->retry(2, 500)
                        ->get('https://secure.geonames.org/postalCodeSearchJSON', [
                            'postalcode' => $postalCode,
                            'country' => $countryCode,
                            'maxRows' => 10,
                            'username' => $username,
                        ]);

                    if (! $response->successful() || $response->json('status.message')) {
                        Log::warning('Postal area geocoding failed', [
                            'postal_code' => $postalCode,
                            'country_code' => $countryCode,
                            'status' => $response->json('status.message'),
                        ]);
                        return $fallback;
                    }

                    $place = collect($response->json('postalCodes', []))->first();
                    foreach (['placeName', 'adminName3', 'adminName2'] as $field) {
                        if (! empty($place[$field])) {
                            return $place[$field];
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
        );
    }

    public function fallback(?string $postalCode): string
    {
        $postalCode = trim((string) $postalCode);

        return $postalCode === '' ? 'Unknown' : 'Postal area '.$postalCode;
    }
}
