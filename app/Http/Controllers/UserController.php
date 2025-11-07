<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicycle;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $rentals = Rental::where('user_id', $user->id)
                        ->with('bicycle')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('user.dashboard', compact('rentals'));
    }

    public function bicycles()
    {
        $bicycles = Bicycle::available()->get();
        return view('user.bicycles', compact('bicycles'));
    }

    public function rentBicycle(Request $request, $bicycleId)
    {
        // 🔧 TODO: Implement rental logic
        return "Rental logic will be implemented here";
    }
}
