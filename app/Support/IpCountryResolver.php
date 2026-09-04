<?php

namespace App\Support;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IpCountryResolver
{
    public static function resolve(Request $request): array
    {
        $ip = $request->ip();
        $headerCountry = $request->header('CF-IPCountry') ?: $request->header('X-Country-Code');

        if ($headerCountry && strtoupper($headerCountry) !== 'XX') {
            $countryCode = strtoupper($headerCountry);
            $countryName = Country::where('code', $countryCode)->value('name');
            return [
                'ip' => $ip,
                'country' => $countryName ?: $countryCode,
                'state' => $request->header('CF-Region') ?: 'Unknown',
                'city' => $request->header('CF-IPCity') ?: 'Unknown',
                'area' => $request->header('CF-IPDistrict') ?: 'Unknown',
            ];
        }

        if (! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return self::unknownLocation($ip);
        }

        $location = Cache::remember('ip-location:'.$ip, now()->addDays(30), function () use ($ip) {
            try {
                $response = Http::connectTimeout(2)->timeout(3)->get(
                    'http://ip-api.com/json/'.urlencode($ip),
                    ['fields' => 'status,country,regionName,city,district']
                );

                if ($response->successful() && $response->json('status') === 'success') {
                    return [
                        'country' => $response->json('country') ?: 'Unknown',
                        'state' => $response->json('regionName') ?: 'Unknown',
                        'city' => $response->json('city') ?: 'Unknown',
                        'area' => $response->json('district') ?: 'Unknown',
                    ];
                }

                return self::unknownLocation();
            } catch (\Throwable $error) {
                Log::warning('IP location lookup failed', ['ip' => $ip, 'message' => $error->getMessage()]);
                return self::unknownLocation();
            }
        });

        return array_merge(['ip' => $ip], $location);
    }

    private static function unknownLocation(?string $ip = null): array
    {
        return array_filter([
            'ip' => $ip,
            'country' => 'Unknown',
            'state' => 'Unknown',
            'city' => 'Unknown',
            'area' => 'Unknown',
        ], static fn ($value, $key) => $key !== 'ip' || $value !== null, ARRAY_FILTER_USE_BOTH);
    }
}
