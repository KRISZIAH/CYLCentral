<link rel="stylesheet" href="{{ asset('css/partials-css/navbar.css') }}">

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">    
    <div class="container">
        <!-- Logo/Brand -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/logos/cylcentral-logo2.png') }}" alt="Logo" height="30" class="d-inline-block align-top me-2">
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <!-- <div class="collapse navbar-collapse" id="navbarContent"> -->
            <!-- Left Side - Main Navigation -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('events') ? 'active fw-bold' : '' }}" href="{{ route('events') }}">
                        Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('membership') ? 'active fw-bold' : '' }}" href="{{ route('membership') }}">
                        Membership
                    </a>
                </li>
            </ul>

            <!-- Right Side - Auth Links -->
            <!-- Right Side - Auth Links -->
<ul class="navbar-nav ms-auto">
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link login-btn" href="{{ route('login') }}">LOG IN</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="btn signup-btn ms-2" href="{{ route('register') }}">SIGN UP</a>
            </li>
        @endif
    @else
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->first_name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ route('editprofile') }}">
                    <i class="fas fa-user-edit me-2"></i> Edit Profile
                </a>
                <a class="dropdown-item" href="{{ route('files') }}">
                    <i class="fas fa-folder me-2"></i> Files
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>
        </div> <!-- End of Navbar Content -->
    </div>
</nav>

<!-- Ensure Bootstrap and Navbar Scripts -->
<script src="{{ asset('resources/js/partials-js/navbar.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>