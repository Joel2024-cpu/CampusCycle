@extends('layout.admin')

@section('title', 'Data Sepeda')

@section('content')
<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-2 text-success">Data Sepeda</h2>
        <p class="text-muted mb-0">Kelola semua data sepeda yang tersedia di sistem</p>
    </div>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBicycleModal">
        <i class="bi bi-plus-circle me-2"></i>Tambah Sepeda
    </button>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Total Sepeda</h6>
                    <h3 class="text-success">{{ $stats['total'] }}</h3>
                </div>
                <i class="bi bi-bicycle fs-4 text-success"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Tersedia</h6>
                    <h3 class="text-success">{{ $stats['available'] }}</h3>
                </div>
                <i class="bi bi-check-circle fs-4 text-success"></i>
            </div>
            <div class="progress mt-2" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: {{ $stats['total'] > 0 ? ($stats['available'] / $stats['total']) * 100 : 0 }}%"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Disewa</h6>
                    <h3 class="text-warning">{{ $stats['rented'] }}</h3>
                </div>
                <i class="bi bi-clock fs-4 text-warning"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Perbaikan</h6>
                    <h3 class="text-danger">{{ $stats['maintenance'] }}</h3>
                </div>
                <i class="bi bi-tools fs-4 text-danger"></i>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Data Sepeda -->
<div class="card-custom">
    <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span><i class="bi bi-bicycle me-2"></i> Daftar Sepeda</span>
        <div class="text-muted small">
            Menampilkan {{ $bicycles->total() }} sepeda
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover mb-0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Sepeda</th>
                        <th>Tipe</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Total Disewa</th>
                        <th>Harga/Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bicycles as $bicycle)
                    <tr>
                        <td class="fw-semibold text-success">{{ $bicycle->code }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $bicycle->image ?? 'https://cdn-icons-png.flaticon.com/512/2972/2972185.png' }}"
                                     class="rounded me-2" width="32" height="32">
                                <div>
                                    <div class="fw-semibold">{{ $bicycle->name }}</div>
                                    <small class="text-muted">Warna: {{ $bicycle->color }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">{{ $bicycle->type }}</span>
                        </td>
                        <td>{{ $bicycle->location }}</td>
                        <td>
                            @if($bicycle->status == 'available')
                                <span class="badge bg-success">Tersedia</span>
                            @elseif($bicycle->status == 'rented')
                                <span class="badge bg-warning">Disewa</span>
                            @else
                                <span class="badge bg-danger">Perbaikan</span>
                            @endif
                        </td>
                        <td class="fw-semibold text-success">{{ $bicycle->rentals_count }}x</td>
                        <td class="fw-semibold text-success">Rp {{ number_format($bicycle->price_per_hour, 0, ',', '.') }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-success" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning" title="Perbaikan">
                                    <i class="bi bi-tools"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-bicycle fs-1 d-block mb-2"></i>
                            Belum ada data sepeda
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($bicycles->hasPages())
        <div class="card-footer bg-white border-0">
            {{ $bicycles->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
