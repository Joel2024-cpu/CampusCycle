@extends('layout.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="card-title">Halo, {{ Auth::user()->name }}! 👋</h2>
                    <p class="text-muted">Selamat datang di CampusCycle - Sistem Sewa Sepeda Kampus</p>

                    <div class="row mt-4">
                        <!-- Quick Stats -->
                        <div class="col-md-3 mb-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center">
                                    <h4>0</h4>
                                    <small>Penyewaan Aktif</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center">
                                    <h4>0</h4>
                                    <small>Total Penyewaan</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-4">
                        <a href="#" class="btn btn-success me-2">
                            🚲 Lihat Sepeda Tersedia
                        </a>
                        <a href="#" class="btn btn-outline-primary">
            📋 Riwayat Penyewaan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
