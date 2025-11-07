@extends('layout.app')

@section('title', 'Login - CampusCycle')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="card card-custom">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">
                            <i class="fas fa-bicycle me-2"></i>CampusCycle
                        </h3>
                        <p class="text-muted">Masuk ke akun Anda</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="contoh@unej.ac.id">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100 py-2">
                            <i class="fas fa-sign-in-alt me-2"></i>Masuk
                        </button>

                        <p class="text-center mt-3">
                            Belum punya akun?
                            <a href="/register" class="text-success fw-semibold">Daftar di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
