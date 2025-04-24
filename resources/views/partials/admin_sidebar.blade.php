<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<div class="sidebar bg-white p-3 d-flex flex-column align-items-center" style="width: 240px; height: 100vh; min-height: 100vh;  overflow: hidden;">
    <div class="w-100 d-flex justify-content-center align-items-center mb-2" style="padding-top: 10px;">
        <img src="{{ asset('img/logos/cylcentral-logo2.png') }}" alt="CYLCentral Logo" class="img-fluid" style="width: 181px; height: 40px; display: block; margin: 0 auto; object-fit: contain;">
    </div>
    <ul class="nav flex-column">
        <!-- Section Title -->
<div class="sidebar bg-white p-3 d-flex flex-column align-items-center" style="width: 240px; height: 100vh; min-height: 100vh;  overflow: hidden;">
    <ul class="nav flex-column w-100" style="padding: 6px 12px 0 0;">
        <!-- Section Title -->
        <li class="nav-item mb-2 mt-3" style="color: var(--green1); font-weight: 500; font-size: 16px;">Dashboard</li>
        <!-- Overview -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center px-2 py-1 {{ request()->routeIs('dashboard') ? 'active' : '' }}" style="height:33px; width:210px; border-radius:8px; font-size:16px; font-weight:400; background: {{ request()->routeIs('dashboard') ? 'var(--gradient-green)' : 'rgba(228,241,234,0.5)' }}; padding: 0 16px; margin-bottom: 6px;">
                <i class="bi bi-bar-chart me-2" style="font-size:18px;"></i> Overview
            </a>
        </li>
        <!-- Section Title -->
        <li class="nav-item mb-2 mt-4" style="color: var(--green1); font-weight: 500; font-size: 16px;">Tools</li>

        <li class="nav-item">
            <a href="{{ route('cms') }}" class="nav-link d-flex align-items-center px-2 py-1 {{ request()->routeIs('cms') ? 'active' : '' }}" style="height:33px; width:210px; border-radius:8px; font-size:16px; font-weight:400; background: {{ request()->routeIs('cms') ? 'var(--gradient-green)' : 'rgba(228,241,234,0.5)' }}; padding: 0 16px; margin-bottom: 6px;">
                <i class="bi bi-layout-text-window-reverse me-2" style="font-size:18px;"></i> CMS
            </a>
        </li>
        <!-- Users -->
        <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link d-flex align-items-center px-2 py-1 {{ request()->routeIs('users') ? 'active' : '' }}" style="height:33px; width:210px; border-radius:8px; font-size:16px; font-weight:400; background: {{ request()->routeIs('users') ? 'var(--gradient-green)' : 'rgba(228,241,234,0.5)' }}; padding: 0 16px; margin-bottom: 6px;">
                <i class="bi bi-people me-2" style="font-size:18px;"></i> Users
            </a>
        </li>
        <!-- Registrations -->
        <li class="nav-item">
            <a href="{{ route('registrations') }}" class="nav-link d-flex align-items-center px-2 py-1 {{ request()->routeIs('registrations') ? 'active' : '' }}" style="height:33px; width:210px; border-radius:8px; font-size:16px; font-weight:400; background: {{ request()->routeIs('registrations') ? 'var(--gradient-green)' : 'rgba(228,241,234,0.5)' }}; padding: 0 16px; margin-bottom: 6px;">
                <i class="bi bi-person-plus me-2" style="font-size:18px;"></i> Registrations
            </a>
        </li>
        <!-- Payments -->
        <li class="nav-item">
            <a href="{{ route('payments') }}" class="nav-link d-flex align-items-center px-2 py-1 {{ request()->routeIs('payments') ? 'active' : '' }}" style="height:33px; width:210px; border-radius:8px; font-size:16px; font-weight:400; background: {{ request()->routeIs('payments') ? 'var(--gradient-green)' : 'rgba(228,241,234,0.5)' }}; padding: 0 16px; margin-bottom: 6px;">
                <i class="bi bi-credit-card me-2" style="font-size:18px;"></i> Payments
            </a>
        </li>
        <!-- Attendance -->
        <li class="nav-item">
            <a href="{{ route('attendance') }}" class="nav-link d-flex align-items-center px-2 py-1 {{ request()->routeIs('attendance') ? 'active' : '' }}" style="height:33px; width:210px; border-radius:8px; font-size:16px; font-weight:400; background: {{ request()->routeIs('attendance') ? 'var(--gradient-green)' : 'rgba(228,241,234,0.5)' }}; padding: 0 16px; margin-bottom: 6px;">
                <i class="bi bi-calendar-check me-2" style="font-size:18px;"></i> Attendance
            </a>
        </li>
        <!-- Announcements -->
        <li class="nav-item">
            <a href="{{ route('announcements') }}" class="nav-link d-flex align-items-center px-2 py-1 {{ request()->routeIs('announcements') ? 'active' : '' }}" style="height:33px; width:210px; border-radius:8px; font-size:16px; font-weight:400; background: {{ request()->routeIs('announcements') ? 'var(--gradient-green)' : 'rgba(228,241,234,0.5)' }}; padding: 0 16px; margin-bottom: 6px;">
                <i class="bi bi-megaphone me-2" style="font-size:18px;"></i> Announcements
            </a>
        </li>
    </ul>
</div>

<style>
    .sidebar {
        background-color: var(--white) !important;
        overflow: hidden !important;
        height: 100vh !important;
        min-height: 100vh !important;
        max-height: 100vh !important;
        box-shadow: none !important;
    }

    .nav-item {
        margin-bottom: 3px;
    }

    .nav-link {
        background-color: var(--mint) !important;
        color: var(--green1) !important;
        padding: 10px 15px !important;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .nav-link.active {
        background-color: var(--green1) !important;
        color: white !important;
        font-weight: 500;
        transform: scale(1.02);
    }

    .nav-link:hover:not(.active) {
        background-color: var(--green1) !important;
        color: var(--white) !important;
        transform: translateX(5px);
    }

    .nav-link i {
        transition: all 0.3s ease;
    }

    .nav-link.active i {
        color: white !important;
        transform: scale(1.1);
    }
</style>