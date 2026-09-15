<?php

namespace Tests\Unit;

use App\Models\ContactSubmission;
use App\Models\Visitor;
use App\Services\AnalyticsCsvBuilder;
use App\Services\PostalAreaResolver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AnalyticsReportingTest extends TestCase
{
    public function test_csv_contains_filterable_location_and_ip_columns(): void
    {
        $visitor = new Visitor([
            'ip_address' => '203.0.113.10', 'country' => 'Pakistan', 'state' => 'Sindh',
            'city' => 'Karachi', 'postal_code' => '74000', 'area' => 'Karachi Central',
            'visit_date' => '2026-09-14',
        ]);
        $visitor->id = 1;
        $visitor->created_at = '2026-09-14 10:30:00';

        $contact = new ContactSubmission([
            'fullname' => '=Unsafe Formula', 'email' => 'person@example.com', 'subject' => 'Project',
            'message' => 'Hello', 'ip_address' => '203.0.113.11', 'country' => 'Pakistan',
            'state' => 'Sindh', 'city' => 'Karachi', 'postal_code' => '74000', 'area' => 'Karachi Central',
        ]);
        $contact->id = 2;
        $contact->created_at = '2026-09-14 11:30:00';

        $csv = app(AnalyticsCsvBuilder::class)->build(collect([$visitor]), collect([$contact]));

        $this->assertStringContainsString('"IP Address",Country,State,City,"Postal Code",Area', $csv);
        $this->assertStringContainsString('203.0.113.10,Pakistan,Sindh,Karachi,74000,"Karachi Central"', $csv);
        $this->assertStringContainsString("'=Unsafe Formula", $csv);
    }

    public function test_geonames_returns_a_place_name_for_postal_area(): void
    {
        config(['analytics.geonames_username' => 'test-user']);
        Cache::flush();
        Http::fake(['secure.geonames.org/*' => Http::response([
            'postalCodes' => [[
                'placeName' => 'Gulshan-e-Iqbal',
                'adminName2' => 'Karachi',
            ]],
        ])]);

        $area = app(PostalAreaResolver::class)->resolve('75300', 'PK');

        $this->assertSame('Gulshan-e-Iqbal', $area);
        Http::assertSent(fn ($request) => str_contains($request->url(), 'secure.geonames.org/postalCodeSearchJSON'));
    }
}
