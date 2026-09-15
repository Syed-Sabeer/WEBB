<?php

namespace App\Console\Commands;

use App\Models\ContactSubmission;
use App\Models\Country;
use App\Models\Visitor;
use App\Services\PostalAreaResolver;
use Illuminate\Console\Command;

class EnrichPostalAreas extends Command
{
    protected $signature = 'analytics:enrich-postal-areas';

    protected $description = 'Resolve stored postal codes into the most specific available area names';

    public function handle(PostalAreaResolver $resolver): int
    {
        $locations = Visitor::query()
            ->whereNotNull('postal_code')
            ->where(function ($query) {
                $query->whereNull('area')->orWhere('area', 'Unknown')->orWhere('area', 'like', 'Postal area %');
            })
            ->get(['country', 'postal_code'])
            ->concat(ContactSubmission::query()
                ->whereNotNull('postal_code')
                ->where(function ($query) {
                    $query->whereNull('area')->orWhere('area', 'Unknown')->orWhere('area', 'like', 'Postal area %');
                })
                ->get(['country', 'postal_code']))
            ->unique(fn ($row) => $row->country.'|'.$row->postal_code)
            ->values();

        $updated = 0;
        foreach ($locations as $index => $location) {
            if ($index > 0) {
                usleep(15_000_000);
            }
            $countryCode = strlen((string) $location->country) === 2
                ? strtoupper($location->country)
                : Country::where('name', $location->country)->value('code');
            $area = $resolver->resolve($location->postal_code, $countryCode);

            foreach ([Visitor::class, ContactSubmission::class] as $model) {
                $updated += $model::query()
                    ->where('country', $location->country)
                    ->where('postal_code', $location->postal_code)
                    ->where(function ($query) {
                        $query->whereNull('area')->orWhere('area', 'Unknown')->orWhere('area', 'like', 'Postal area %');
                    })
                    ->update(['area' => $area]);
            }
        }

        $this->info("Postal area enrichment completed; {$updated} records updated.");
        return self::SUCCESS;
    }
}
