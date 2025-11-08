@extends('layout.user')

@section('title', 'Riwayat Penyewaan')

@section('content')
<h4 class="fw-bold mb-4 text-success">Riwayat Penyewaan Anda</h4>

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>#ID</th>
                        <th>Sepeda</th>
                        <th>Mulai</th>
                        <th>Status</th>
                        <th>Total</th>
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
                            <td>Rp {{ number_format($rental->total_cost ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-1 mb-3 d-block"></i>
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
