<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicycle;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 🔹 Dashboard: tampilkan riwayat penyewaan user
    public function dashboard()
    {
        $user = Auth::user();
        $rentals = Rental::where('user_id', $user->id)
                        ->with('bicycle')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('user.dashboard', compact('user', 'rentals'));
    }

    // 🔹 Halaman daftar sepeda
    public function bicycles()
    {
        $bicycles = Bicycle::where('status', 'available')->get(); // pastikan kolom status ada
        return view('user.bicycles', compact('bicycles'));
    }

    // 🔹 Proses penyewaan sepeda
    public function rentBicycle(Request $request, $bicycleId)
    {
        $user = Auth::user();
        $bicycle = Bicycle::findOrFail($bicycleId);

        if ($bicycle->status !== 'available') {
            return redirect()->back()->with('error', 'Sepeda ini sedang tidak tersedia.');
        }

        // Buat rental baru
        $rental = new Rental();
        $rental->user_id = $user->id;
        $rental->bicycle_id = $bicycle->id;
        $rental->start_time = now();
        $rental->status = 'ongoing';
        $rental->save();

        // Update status sepeda
        $bicycle->status = 'rented';
        $bicycle->save();

        return redirect()->route('user.dashboard')->with('success', 'Penyewaan berhasil dimulai!');
    }

    // 🔹 Riwayat penyewaan (opsional)
    public function history()
    {
        $user = Auth::user();
        $rentals = Rental::where('user_id', $user->id)->with('bicycle')->latest()->get();

        return view('user.history', compact('rentals'));
    }
}
