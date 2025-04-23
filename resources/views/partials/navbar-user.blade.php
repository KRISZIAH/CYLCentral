<!-- Cordibot + Notification + Profile Nav -->
<li class="nav-item">
    <div class="navbar-user-group d-flex align-items-center" style="gap: 2px;">
        <!-- Cordibot Logo -->
        <img src="/img/cordibot.png" alt="Cordibot" height="32" width="32" style="border-radius:50%; background:#e6f7f3;" />

        <!-- Notification Bell -->
        <a href="{{ route('notifications') }}" class="nav-link p-0" title="Notifications">
            <i class="fas fa-bell fa-lg" style="color: var(--green1);"></i>
        </a>

        <!-- Divider -->
        <span style="height: 32px; border-left: 2px solid var(--green1); margin: 0 2px;"></span>

        <!-- Profile Avatar + Dropdown -->
        <div class="dropdown d-inline-block">
            <a href="#" class="nav-link p-0" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; gap: 2px;">
            @php
                $user = Auth::user();
                $initial = $user ? strtoupper(substr($user->first_name,0,1)) : 'U';
                $bgColors = ['#003D2B', '#21A179', '#C56659']; // --green1, --green2, --brown from app.css
                $bg = $bgColors[ord($initial)%count($bgColors)];
            @endphp
            @if($user && $user->profile_photo)
                <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Profile" class="rounded-circle" width="32" height="32">
            @else
                <span class="rounded-circle d-flex justify-content-center align-items-center" style="background: {{ $bg }}; color: #fff; width:32px; height:32px; font-size: 1.05em; font-weight:600;">{{ $initial }}</span>
            @endif
            <i class="fas fa-chevron-down" style="color: var(--green1);"></i>
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
    </div>
</li>
