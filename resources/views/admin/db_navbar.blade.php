<div class="container-fluid p-3 top" style="background: var(--mint);">
  <div class="d-flex justify-content-between align-items-center p-3" style="width: 1155.6px; height: 74px; margin: 0 auto;">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 align-items-center" style="margin-left:0; margin-right:auto;">
        <li class="breadcrumb-item">
          <a href="#" class="text-decoration-none" style="font-size: 32px; font-weight: 600;">@if(($section ?? '') === 'Overview') Dashboard @else Tools @endif</a>
        </li>
        <li class="breadcrumb-separator" style="padding: 0 6px; vertical-align: middle;">
          <svg width="18" height="18" style="display:inline;vertical-align:middle;" viewBox="0 0 24 24" fill="none" stroke="var(--brown)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </li>
        <li class="breadcrumb-item active" aria-current="page" style="color: var(--green1); font-weight: 400; font-size: 24px;">
          {{ $section ?? 'Section' }}
        </li>
      </ol>
    </nav>

    <!-- User Profile Section -->
    <div class="d-flex align-items-center AdminProfile">
      <div class="nav-icons">
        <i class="bi bi-chat-dots-fill"></i>
        <i class="bi bi-bell-fill"></i>
      </div>
      <div class="user-info d-flex align-items-center dropdown">
        <!-- Dropdown Toggle (entire user info section) -->
        <a href="#" class="d-flex align-items-center text-decoration-none" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="gap: 10px;">
          <!-- Profile Initial Circle -->
          <div class="profile-img d-flex justify-content-center align-items-center" style="width: 35px; height: 35px; border-radius: 50%; background: var(--green2); color: var(--white); font-weight: 700; font-size: 18px; user-select: none;">
            @php
              if (Auth::check()) {
                $firstInitial = substr(Auth::user()->first_name ?? '', 0, 1);
                $lastInitial = substr(Auth::user()->last_name ?? '', 0, 1);
                echo $firstInitial . $lastInitial;
              } else {
                echo 'U';
              }
            @endphp
          </div>
          <div class="d-flex flex-column justify-content-center" style="min-width: 120px;">
            <span class="user-name" style="color: var(--green1); font-weight: 500; font-size: 16px; line-height: 1; margin-left: 0;">
              {{ Auth::user()->first_name ?? '' }} {{ Auth::user()->last_name ?? '' }}
            </span>
            <div class="d-flex align-items-center mt-1" style="font-size: 12px; color: rgba(0,61,43,0.5); font-weight: 400; align-items: start;">
              <span class="d-flex align-items-center" style="padding-left: 0;">
                <i class="bi bi-patch-check-fill me-1"></i>
                <span>{{ Auth::user()->role ?? 'Guest' }}</span>
              </span>
            </div>
          </div>
          <i class="fas fa-chevron-down ms-2" style="color: var(--green1);"></i>
        </a>
        
        <!-- Dropdown Menu -->
        <div class="dropdown-menu dropdown-menu-end" style="min-width: 220px; border-radius: 15px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
          <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('admin.editprofile') }}" style="border-radius: 8px;">
            <span class="d-flex justify-content-center align-items-center me-3" style="width: 28px; height: 28px; color: #006241;">
              <i class="fas fa-user" style="font-size: 18px;"></i>
            </span>
            <span style="font-weight: 500; color: #006241;">Profile</span>
          </a>
          <div class="dropdown-divider my-2" style="border-color: #eaeaea;"></div>
          <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('admin.logout') }}" 
             onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" style="border-radius: 8px;">
            <span class="d-flex justify-content-center align-items-center me-3" style="width: 28px; height: 28px; color: #dc3545;">
              <i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>
            </span>
            <span style="font-weight: 500; color: #dc3545;">Log Out</span>
          </a>
          <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="top-divider"></div>
</div>
