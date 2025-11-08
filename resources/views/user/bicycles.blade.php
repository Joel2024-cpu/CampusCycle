@extends('layout.user')

@section('title', 'Daftar Sepeda')

@section('content')
<h4 class="fw-bold mb-4 text-success">Sepeda Tersedia</h4>

@if($bicycles->isEmpty())
    <div class="text-center text-muted py-5">
        <i class="bi bi-inbox fs-1 mb-3"></i>
        <p>Tidak ada sepeda tersedia saat ini.</p>
    </div>
@else
    <div class="row g-3">
        @foreach ($bicycles as $bicycle)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <img src="{{ asset('images/bicycles/' . $bicycle->image) }}" class="card-img-top rounded-top-4" alt="{{ $bicycle->name }}">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">{{ $bicycle->name }}</h6>
                        <small class="text-muted d-block mb-2">{{ $bicycle->type }}</small>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-semibold text-success">Rp {{ number_format($bicycle->price_per_hour, 0, ',', '.') }}/jam</span>
                            <form action="{{ route('user.rent', $bicycle->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm rounded-pill px-3"
                                    {{ $bicycle->status != 'available' ? 'disabled' : '' }}>
                                    Sewa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
