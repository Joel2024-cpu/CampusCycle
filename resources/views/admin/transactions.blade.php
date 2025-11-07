@extends('layout.admin')

@section('title', 'Data Transaksi')

@section('content')
<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-2 text-success">Data Transaksi</h2>
        <p class="text-muted mb-0">Kelola semua transaksi penyewaan sepeda</p>
    </div>
    <button class="btn btn-success">
        <i class="bi bi-plus-circle me-2"></i>Transaksi Baru
    </button>
</div>

<!-- Status Overview -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Pending</h6>
                    <h3 class="text-info">{{ $status_counts['pending'] }}</h3>
                </div>
                <i class="bi bi-clock fs-4 text-info"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Berjalan</h6>
                    <h3 class="text-warning">{{ $status_counts['berjalan'] }}</h3>
                </div>
                <i class="bi bi-play-circle fs-4 text-warning"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Selesai</h6>
                    <h3 class="text-success">{{ $status_counts['selesai'] }}</h3>
                </div>
                <i class="bi bi-check-circle fs-4 text-success"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6>Dibatalkan</h6>
                    <h3 class="text-danger">{{ $status_counts['batal'] }}</h3>
                </div>
                <i class="bi bi-x-circle fs-4 text-danger"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filter -->
<div class="card-custom mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="berjalan">Berjalan</option>
                    <option value="selesai">Selesai</option>
                    <option value="batal">Dibatalkan</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-outline-success w-100">Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Transaksi -->
<div class="card-custom">
    <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span><i class="bi bi-clock-history me-2"></i> Daftar Transaksi</span>
        <div class="text-muted small">
            Menampilkan {{ $transactions->total() }} transaksi
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pengguna</th>
                        <th>Sepeda</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Durasi</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction)
                    <tr>
                        <td class="fw-semibold text-success">#T{{ $transaction->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($transaction->user->name) }}&background=006837&color=fff"
                                     class="rounded-circle me-2" width="32" height="32">
                                <div>
                                    <div class="fw-semibold">{{ $transaction->user->name }}</div>
                                    <small class="text-muted">{{ $transaction->user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/2972/2972185.png"
                                     class="rounded me-2" width="24" height="24">
                                <div>
                                    <div class="fw-semibold">{{ $transaction->bicycle->name }}</div>
                                    <small class="text-muted">{{ $transaction->bicycle->type }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $transaction->start_time->format('d M Y') }}</div>
                            <small class="text-muted">{{ $transaction->start_time->format('H:i') }}</small>
                        </td>
                        <td>
                            @if($transaction->end_time)
                                <div class="fw-semibold">{{ $transaction->end_time->format('d M Y') }}</div>
                                <small class="text-muted">{{ $transaction->end_time->format('H:i') }}</small>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">{{ $transaction->duration }} jam</span>
                        </td>
                        <td class="fw-bold text-success">
                            Rp {{ number_format($transaction->total_cost, 0, ',', '.') }}
                        </td>
                        <td>
                            @if($transaction->status == 'pending')
                                <span class="badge bg-info">Pending</span>
                            @elseif($transaction->status == 'berjalan')
                                <span class="badge bg-warning">Berjalan</span>
                            @elseif($transaction->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-danger">Dibatalkan</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-success" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @if($transaction->status == 'pending')
                                    <button class="btn btn-sm btn-outline-primary" title="Konfirmasi">
                                        <i class="bi bi-check"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" title="Tolak">
                                        <i class="bi bi-x"></i>
                                    </button>
                                @elseif($transaction->status == 'berjalan')
                                    <button class="btn btn-sm btn-outline-success" title="Selesaikan">
                                        <i class="bi bi-flag"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            <i class="bi bi-clock-history fs-1 d-block mb-2"></i>
                            Belum ada data transaksi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($transactions->hasPages())
        <div class="card-footer bg-white border-0">
            {{ $transactions->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
