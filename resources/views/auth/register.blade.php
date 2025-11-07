@extends('layout.app')

@section('title', 'Daftar - CampusCycle')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card card-custom">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">
                            <i class="fas fa-bicycle me-2"></i>CampusCycle
                        </h3>
                        <p class="text-muted">Buat akun baru Anda</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="contoh@unej.ac.id">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100 py-2">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </button>

                        <p class="text-center mt-3">
                            Sudah punya akun?
                            <a href="/login" class="text-success fw-semibold">Login di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
