<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('visit_date', today())->count();
        $totalContacts = ContactSubmission::count();

        $period = in_array($request->query('period'), ['today', 'week', 'all'], true)
            ? $request->query('period')
            : 'all';
        $periodLabel = ['today' => 'Today', 'week' => 'Last 7 Days', 'all' => 'All Time'][$period];

        $visitorQuery = Visitor::query();
        $contactQuery = ContactSubmission::query();

        if ($period === 'today') {
            $visitorQuery->whereDate('visit_date', today());
            $contactQuery->whereDate('created_at', today());
        } elseif ($period === 'week') {
            $visitorQuery->whereDate('visit_date', '>=', today()->subDays(6));
            $contactQuery->where('created_at', '>=', now()->subDays(7));
        }

        $filteredVisitorTotal = (clone $visitorQuery)->count();
        $filteredContactTotal = (clone $contactQuery)->count();
        $visitorLocations = $this->visitorLocationHierarchy($visitorQuery, $filteredVisitorTotal);
        $contactCountries = $this->topCountries($contactQuery, $filteredContactTotal);

        return view('admin.dashboard', compact(
            'totalVisitors',
            'todayVisitors',
            'totalContacts',
            'period',
            'periodLabel',
            'filteredVisitorTotal',
            'filteredContactTotal',
            'visitorLocations',
            'contactCountries'
        ));
    }

    public function visitorLocations(Request $request)
    {
        $period = in_array($request->query('period'), ['today', 'week', 'all'], true)
            ? $request->query('period')
            : 'all';
        $periodLabel = ['today' => 'Today', 'week' => 'Last 7 Days', 'all' => 'All Time'][$period];
        $visitorQuery = Visitor::query();

        if ($period === 'today') {
            $visitorQuery->whereDate('visit_date', today());
        } elseif ($period === 'week') {
            $visitorQuery->whereDate('visit_date', '>=', today()->subDays(6));
        }

        $total = (clone $visitorQuery)->count();
        $nodes = $this->visitorLocationHierarchy($visitorQuery, $total);
        $selections = [];
        $levels = ['country' => 'Country', 'state' => 'State', 'city' => 'City'];

        foreach ($levels as $parameter => $label) {
            $value = $request->query($parameter);

            if ($value === null) {
                break;
            }

            $selectedNode = $nodes->firstWhere('label', $value);
            abort_unless($selectedNode, 404);
            $selections[$parameter] = $selectedNode->label;
            $nodes = $selectedNode->children;
        }

        abort_if(! isset($selections['country']), 404);
        $nextParameter = collect(['country', 'state', 'city', 'area'])
            ->first(fn ($parameter) => ! array_key_exists($parameter, $selections));
        $levelLabel = ['state' => 'States', 'city' => 'Cities', 'area' => 'Areas'][$nextParameter] ?? 'Locations';

        return view('admin.visitor-locations', compact(
            'period',
            'periodLabel',
            'total',
            'nodes',
            'selections',
            'nextParameter',
            'levelLabel'
        ));
    }

    private function topCountries(Builder $query, int $total)
    {
        $countries = (clone $query)->selectRaw(
            "COALESCE(NULLIF(country, ''), 'Unknown') as normalized_country"
        );

        return DB::query()
            ->fromSub($countries, 'country_records')
            ->selectRaw('normalized_country as country, COUNT(*) as total')
            ->groupBy('normalized_country')
            ->orderByDesc('total')
            ->limit(10)
            ->get()
            ->map(function ($row) use ($total) {
                $row->percentage = $total > 0 ? round(($row->total / $total) * 100, 1) : 0;
                return $row;
            });
    }

    private function visitorLocationHierarchy(Builder $query, int $total)
    {
        $locationColumns = ['country', 'state', 'city', 'area'];
        $normalizedColumns = collect($locationColumns)
            ->map(fn ($column) => "COALESCE(NULLIF({$column}, ''), 'Unknown') as normalized_{$column}")
            ->implode(', ');

        $locations = (clone $query)->selectRaw($normalizedColumns);
        $normalizedLocationColumns = collect($locationColumns)
            ->map(fn ($column) => 'normalized_'.$column)
            ->all();

        $rows = DB::query()
            ->fromSub($locations, 'location_records')
            ->selectRaw(collect($locationColumns)
                ->map(fn ($column) => "normalized_{$column} as {$column}")
                ->implode(', ').', COUNT(*) as total')
            ->groupBy($normalizedLocationColumns)
            ->orderByDesc('total')
            ->get();

        return $this->buildLocationLevel($rows, $locationColumns, $total);
    }

    private function buildLocationLevel($rows, array $levels, int $total)
    {
        $field = array_shift($levels);

        return $rows
            ->groupBy($field)
            ->map(function ($group, $label) use ($levels, $total) {
                $visits = (int) $group->sum('total');

                return (object) [
                    'label' => $label,
                    'total' => $visits,
                    'percentage' => $total > 0 ? round(($visits / $total) * 100, 1) : 0,
                    'children' => $levels
                        ? $this->buildLocationLevel($group, $levels, $total)
                        : collect(),
                ];
            })
            ->sortByDesc('total')
            ->values();
    }
}
