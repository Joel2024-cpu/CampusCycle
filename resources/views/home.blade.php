@extends('layout.app')

@section('title', 'Beranda - Sewa Sepeda UNEJ')

@section('content')

<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0, 104, 55, 0.9), rgba(0, 0, 0, 0.7)), url('https://maukuliah.ap-south-1.linodeobjects.com/gallery/001025/Gedung%205%20UNEJ-thumbnail.jpg') center/cover no-repeat; min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-3 fw-bold text-white mb-4">
                    Transportasi <span class="text-warning">Cerdas</span> & Ramah Lingkungan di UNEJ
                </h1>
                <p class="lead text-white mb-5 fs-5">
                    CampusCycle memudahkan penyewaan sepeda kampus secara digital, efisien, dan hemat energi.
                    Nikmati kemudahan transportasi ramah lingkungan dengan harga terjangkau.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="/register" class="btn btn-warning btn-lg px-5 py-3 fw-semibold">
                        <i class="fas fa-bicycle me-2"></i>Mulai Sekarang
                    </a>
                    <a href="#fitur" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-play-circle me-2"></i>Pelajari Lebih Lanjut
                    </a>
                </div>

                <!-- Stats -->
                <div class="row mt-5 pt-4">
                    <div class="col-4 text-center">
                        <h3 class="text-warning fw-bold mb-1">500+</h3>
                        <p class="text-white-50 mb-0">Sepeda Tersedia</p>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="text-warning fw-bold mb-1">2.5K+</h3>
                        <p class="text-white-50 mb-0">Pengguna Aktif</p>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="text-warning fw-bold mb-1">98%</h3>
                        <p class="text-white-50 mb-0">Kepuasan Pengguna</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="floating">
                    <img src="https://cdn-icons-png.flaticon.com/512/2972/2972185.png" alt="Sepeda" class="img-fluid" style="max-width: 500px; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3));">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section-padding bg-white" id="fitur">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="section-title-custom">Fitur Unggulan CampusCycle</h2>
                <p class="text-muted fs-5">Kami menyediakan solusi lengkap untuk kebutuhan transportasi ramah lingkungan di kampus UNEJ</p>
            </div>
        </div>
        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper">
                            <i class="fas fa-bicycle fa-3x text-success"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Manajemen Sepeda</h4>
                    <p class="text-muted">Kelola sepeda dengan mudah, dari stok hingga kondisi lapangan. Pantau ketersediaan sepeda secara real-time.</p>
                    <div class="feature-badge mt-3">
                        <span class="badge bg-success">Real-time Tracking</span>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper">
                            <i class="fas fa-money-bill-wave fa-3x text-success"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Konfirmasi Pembayaran</h4>
                    <p class="text-muted">Pembayaran tunai diverifikasi langsung oleh admin untuk memastikan keakuratan dan keamanan transaksi.</p>
                    <div class="feature-badge mt-3">
                        <span class="badge bg-success">Verifikasi Instan</span>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper">
                            <i class="fas fa-calculator fa-3x text-success"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Denda Otomatis</h4>
                    <p class="text-muted">Sistem otomatis menghitung denda keterlambatan dengan tarif tetap dan transparan.</p>
                    <div class="feature-badge mt-3">
                        <span class="badge bg-success">Perhitungan Otomatis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-padding bg-light" id="tentang">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="position-relative">
                    <img src="https://maukuliah.ap-south-1.linodeobjects.com/gallery/001025/Gedung%205%20UNEJ-thumbnail.jpg" alt="Kampus UNEJ" class="img-fluid rounded-3 shadow-lg">
                    <div class="position-absolute bottom-0 start-0 m-4">
                        <div class="glass-card p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0">2.500+</h5>
                                    <small class="text-muted">Pengguna Terdaftar</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title-custom mb-4">Tentang CampusCycle</h2>
                <p class="text-muted mb-4 fs-5">CampusCycle adalah layanan penyewaan sepeda yang beroperasi di lingkungan kampus Universitas Jember (UNEJ). Kami berkomitmen untuk menyediakan solusi transportasi yang ramah lingkungan, terjangkau, dan mudah diakses.</p>

                <div class="row mb-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-leaf text-success me-2"></i>
                            <span class="fw-semibold">Ramah Lingkungan</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-bolt text-success me-2"></i>
                            <span class="fw-semibold">Cepat & Efisien</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-shield-alt text-success me-2"></i>
                            <span class="fw-semibold">Aman & Terjamin</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-money-bill-wave text-success me-2"></i>
                            <span class="fw-semibold">Terjangkau</span>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn btn-success btn-lg px-5">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-success text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4 display-5">Siap Bergabung dengan CampusCycle?</h2>
                <p class="lead mb-5 fs-4">Daftar sekarang dan nikmati kemudahan transportasi ramah lingkungan di kampus UNEJ.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="/register" class="btn btn-warning btn-lg px-5 py-3">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                    <a href="/login" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-sign-in-alt me-2"></i>Masuk
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .section-title-custom {
        font-weight: 800;
        color: var(--primary-dark);
        margin-bottom: 25px;
        position: relative;
        display: inline-block;
        font-size: 2.5rem;
    }

    .section-title-custom::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 6px;
        background: var(--gradient-primary);
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 10px;
    }

    .feature-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        background: rgba(0, 104, 55, 0.1);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .feature-card:hover .icon-wrapper {
        background: rgba(0, 104, 55, 0.2);
        transform: scale(1.1);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .btn-warning {
        background: #FFD200;
        border: none;
        color: #212529;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        background: #ffde59;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(255, 210, 0, 0.3);
    }

    @media (max-width: 768px) {
        .section-title-custom {
            font-size: 2rem;
        }

        .display-3 {
            font-size: 2.5rem;
        }
    }
</style>
@endpush
