<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $ip = request()->ip();

        Visitor::firstOrCreate([
            'ip_address' => $ip,
            'visit_date' => Carbon::today()->toDateString(),
        ]);

        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('visit_date', today())->count();

        return view('admin.dashboard', compact(
            'totalVisitors',
            'todayVisitors'
        ));
    }
}