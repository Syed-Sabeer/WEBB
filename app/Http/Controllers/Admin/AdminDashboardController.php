<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Visitor;
use App\Support\IpCountryResolver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $location = IpCountryResolver::resolve(request());

        $visitor = Visitor::firstOrCreate([
            'ip_address' => $location['ip'],
            'visit_date' => Carbon::today()->toDateString(),
        ], ['country' => $location['country']]);

        if ((! $visitor->country || $visitor->country === 'Unknown') && $location['country'] !== 'Unknown') {
            $visitor->update(['country' => $location['country']]);
        }

        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('visit_date', today())->count();
        $totalContacts = ContactSubmission::count();
        $visitorCountries = $this->topCountries(Visitor::query(), $totalVisitors);
        $contactCountries = $this->topCountries(ContactSubmission::query(), $totalContacts);

        return view('admin.dashboard', compact(
            'totalVisitors',
            'todayVisitors',
            'totalContacts',
            'visitorCountries',
            'contactCountries'
        ));
    }

    private function topCountries(Builder $query, int $total)
    {
        return $query
            ->selectRaw("COALESCE(NULLIF(country, ''), 'Unknown') as country, COUNT(*) as total")
            ->groupBy(DB::raw("COALESCE(NULLIF(country, ''), 'Unknown')"))
            ->orderByDesc('total')
            ->limit(10)
            ->get()
            ->map(function ($row) use ($total) {
                $row->percentage = $total > 0 ? round(($row->total / $total) * 100, 1) : 0;
                return $row;
            });
    }
}
