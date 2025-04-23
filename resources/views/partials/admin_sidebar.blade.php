<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<div class="sidebar bg-white p-3 shadow-sm" style="width: 260px; min-height: 100vh;">
    <div class="text-center mb-4">
        <img src="{{ asset('img/logos/cylcentral-logo2.png') }}" alt="CYLCentral Logo" class="img-fluid" style="max-width: 220px;">
    </div>

    <ul class="nav flex-column">
        <!-- Section Title -->
        <li class="nav-item mb-2 mt-3 text-muted fw-semibold small px-2">Dashboard</li>

        <!-- Overview -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard_analytics') }}" class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('admin.dashboard_analytics') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Overview
            </a>
        </li>

        <!-- Section Title -->
        <li class="nav-item mb-2 mt-4 text-muted fw-semibold small px-2">Tools</li>

        <!-- CMS -->
        <li class="nav-item">
            <a href="{{ route('cms') }}" class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('cms') ? 'active' : '' }}">
                <i class="bi bi-layout-text-window-reverse me-2"></i> CMS
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('users') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Users
            </a>
        </li>

        <!-- Registrations -->
        <li class="nav-item">
            <a href="{{ route('registrations') }}" class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('registrations') ? 'active' : '' }}">
                <i class="bi bi-person-plus me-2"></i> Registrations
            </a>
        </li>

        <!-- Payments -->
        <li class="nav-item">
            <a href="{{ route('payments') }}" class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('payments') ? 'active' : '' }}">
                <i class="bi bi-credit-card me-2"></i> Payments
            </a>
        </li>

        <!-- Attendance -->
        <li class="nav-item">
            <a href="{{ route('attendance') }}" class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('attendance') ? 'active' : '' }}">
                <i class="bi bi-calendar-check me-2"></i> Attendance
            </a>
        </li>

        <!-- Announcements -->
        <li class="nav-item">
            <a href="{{ route('announcements') }}" class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('announcements') ? 'active' : '' }}">
                <i class="bi bi-megaphone me-2"></i> Announcements
            </a>
        </li>
    </ul>
</div>

<style>
    .sidebar {
        background-color: var(--white) !important;
        border-right: 2px solid #ccc;
    }

    .nav-item {
        margin-bottom: 10px;
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
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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