<?php

namespace Tests\Unit;

use App\Support\IpCountryResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class IpCountryResolverTest extends TestCase
{
    public function test_it_uses_postal_code_when_district_is_unavailable(): void
    {
        Cache::forget('ip-location-v3:152.58.184.113');
        Http::fake(['ip-api.com/*' => Http::response([
            'status' => 'success',
            'country' => 'India',
            'countryCode' => 'IN',
            'regionName' => 'Uttar Pradesh',
            'city' => 'Kanpur',
            'district' => '',
            'zip' => '208001',
        ])]);

        $location = IpCountryResolver::resolve(Request::create('/', 'GET', [], [], [], [
            'REMOTE_ADDR' => '152.58.184.113',
        ]));

        $this->assertSame('208001', $location['postal_code']);
        $this->assertSame('Postal area 208001', $location['area']);
    }
}
