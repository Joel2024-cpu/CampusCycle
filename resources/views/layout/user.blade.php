<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | CampusCycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: "Poppins", sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #198754;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 1rem;
        }
        .sidebar a {
            color: #d1e7dd;
            text-decoration: none;
            display: block;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            margin: 0.25rem 0.5rem;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: #157347;
            color: #fff;
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }
        .navbar-user {
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="px-3 mb-4">
            <h4 class="fw-bold">CampusCycle 🚲</h4>
        </div>
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
        <a href="{{ route('user.bicycles') }}" class="{{ request()->routeIs('user.bicycles') ? 'active' : '' }}">
            <i class="bi bi-bicycle me-2"></i> Sepeda
        </a>
        <a href="{{ route('user.history') }}" class="{{ request()->routeIs('user.history') ? 'active' : '' }}">
            <i class="bi bi-clock-history me-2"></i> Riwayat
        </a>
        <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
            @csrf
            <button type="submit" class="btn btn-light w-100 text-success fw-semibold">
                <i class="bi bi-box-arrow-right me-2"></i> Keluar
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="navbar navbar-user mb-4 rounded-3 p-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">@yield('title')</h5>
            <div class="text-muted">
                <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
            </div>
        </nav>

        @yield('content')
    </div>
</body>
</html>
