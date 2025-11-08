<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicycle;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_bicycles' => Bicycle::count(),
            'available_bicycles' => Bicycle::where('status', 'available')->count(),
            'rented_bicycles' => Bicycle::where('status', 'rented')->count(),
            'total_users' => User::where('role', 'user')->count(),
            'total_rentals' => Rental::count(),
            'total_revenue' => Rental::where('status', 'selesai')->sum('total_cost'),
            'total_fines' => Rental::sum('denda')
        ];

        $recent_transactions = Rental::with(['user', 'bicycle'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_transactions'));
    }

    public function bicycles()
    {
        $bicycles = Bicycle::withCount(['rentals' => function($query) {
            $query->where('status', 'selesai');
        }])->latest()->paginate(10);

        $stats = [
            'total' => Bicycle::count(),
            'available' => Bicycle::where('status', 'available')->count(),
            'rented' => Bicycle::where('status', 'rented')->count(),
            'maintenance' => Bicycle::where('status', 'maintenance')->count()
        ];

        return view('admin.bicycles', compact('bicycles', 'stats'));
    }

    public function users()
    {
        $users = User::where('role', 'user')
            ->withCount(['rentals'])
            ->withSum('rentals', 'total_cost')
            ->latest()
            ->paginate(10);

        $stats = [
            'total' => User::where('role', 'user')->count(),
            'active' => User::where('role', 'user')->where('status', 'active')->count(),
            'new_today' => User::where('role', 'user')->whereDate('created_at', today())->count(),
            'blocked' => User::where('role', 'user')->where('status', 'blocked')->count()
        ];

        return view('admin.users', compact('users', 'stats'));
    }

    public function payments()
    {
        $payments = Rental::with(['user', 'bicycle'])
            ->where('status', 'selesai')
            ->latest()
            ->paginate(10);

        $stats = [
            'total_revenue' => Rental::where('status', 'selesai')->sum('total_cost'),
            'total_fines' => Rental::sum('denda'),
            'pending_payments' => Rental::where('status', 'pending')->count(),
            'completed_today' => Rental::where('status', 'selesai')->whereDate('updated_at', today())->count()
        ];

        return view('admin.payments', compact('payments', 'stats'));
    }

    public function transactions()
    {
        $transactions = Rental::with(['user', 'bicycle'])
            ->latest()
            ->paginate(15);

        $status_counts = [
            'pending' => Rental::where('status', 'pending')->count(),
            'berjalan' => Rental::where('status', 'berjalan')->count(),
            'selesai' => Rental::where('status', 'selesai')->count(),
            'batal' => Rental::where('status', 'batal')->count()
        ];

        return view('admin.transactions', compact('transactions', 'status_counts'));
    }

    public function reports()
    {
        // Monthly stats
        $monthly_rentals = Rental::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $monthly_revenue = Rental::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('status', 'selesai')
            ->sum('total_cost');

        $popular_bicycles = Bicycle::withCount(['rentals' => function($query) {
            $query->where('status', 'selesai');
        }])->orderBy('rentals_count', 'desc')->take(5)->get();

        $reports = [
            'monthly_rentals' => $monthly_rentals,
            'monthly_revenue' => $monthly_revenue,
            'popular_bicycles' => $popular_bicycles,
            'active_users' => User::where('role', 'user')
                ->whereHas('rentals', function($query) {
                    $query->whereMonth('created_at', now()->month);
                })->count()
        ];

        return view('admin.reports', compact('reports'));
    }
}   
