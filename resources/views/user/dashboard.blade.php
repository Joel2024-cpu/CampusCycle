@extends('layout.user')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-success">Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p class="text-muted mb-0">Nikmati layanan penyewaan sepeda CampusCycle 🚲</p>
    </div>
    <div class="text-muted">
        <i class="bi bi-calendar3 me-2"></i>{{ now()->format('d M Y, H:i') }}
    </div>
</div>

<!-- Quick Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 p-3 text-center">
            <h6 class="text-muted mb-1">Total Penyewaan</h6>
            <h3 class="text-success">{{ $rentals->count() }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 p-3 text-center">
            <h6 class="text-muted mb-1">Sedang Berjalan</h6>
            <h3 class="text-warning">{{ $rentals->where('status', 'ongoing')->count() }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 p-3 text-center">
            <h6 class="text-muted mb-1">Selesai</h6>
            <h3 class="text-info">{{ $rentals->where('status', 'completed')->count() }}</h3>
        </div>
    </div>
</div>

<!-- Riwayat Singkat -->
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-success bg-opacity-10 fw-semibold">
        <i class="bi bi-clock-history me-2"></i> Riwayat Terbaru
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>#ID</th>
                        <th>Sepeda</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rentals as $rental)
                        <tr>
                            <td class="fw-semibold text-success">#{{ $rental->id }}</td>
                            <td>{{ $rental->bicycle->name ?? '-' }}</td>
                            <td>{{ $rental->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <span class="badge bg-{{ $rental->status == 'completed' ? 'success' : ($rental->status == 'ongoing' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada riwayat penyewaan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
