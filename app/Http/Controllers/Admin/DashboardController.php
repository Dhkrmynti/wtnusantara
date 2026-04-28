<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_customers' => Customer::count(),
            'total_packages' => Package::where('is_active', true)->count(),
            'total_unpaid' => Invoice::where('status', 'unpaid')->sum('amount'),
            'total_paid_month' => Invoice::where('status', 'paid')
                ->whereMonth('created_at', Carbon::now()->month)
                ->sum('amount'),
        ];

        // Dummy data for revenue trend (Last 6 months)
        $revenue_trend = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            'data' => [12000000, 15000000, 14000000, 18000000, 22000000, 25000000]
        ];

        // Package Distribution (Real Data)
        $packages = Package::withCount('customers')->get();
        $package_dist = [
            'labels' => $packages->pluck('name'),
            'data' => $packages->pluck('customers_count')
        ];

        return view('admin.dashboard', compact('stats', 'revenue_trend', 'package_dist'));
    }
}
