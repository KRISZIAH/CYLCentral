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
      <div class="user-info d-flex align-items-center">
        <!-- Profile Initial Circle -->
        <div class="profile-img d-flex justify-content-center align-items-center" style="width: 35px; height: 35px; border-radius: 50%; background: var(--green2); color: var(--white); font-weight: 700; font-size: 18px; user-select: none; cursor: pointer;">
          T
        </div>
        <div class="ms-2 d-flex flex-column justify-content-center position-relative" style="min-width: 120px;">
          <div class="d-flex flex-row align-items-center" style="gap: 0.5rem;">
            <div class="d-flex flex-column align-items-start justify-content-center">
              <span class="user-name" style="color: var(--green1); font-weight: 500; font-size: 16px; line-height: 1; margin-left: 0;">Test Admin</span>
              <div class="d-flex align-items-center mt-1" style="font-size: 12px; color: rgba(0,61,43,0.5); font-weight: 400; align-items: start;">
                <span class="d-flex align-items-center" style="padding-left: 0;">
                  <i class="bi bi-patch-check-fill me-1"></i>
                  <span>Admin</span>
                </span>
              </div>
            </div>
            <!-- Big Arrow Down Centered -->
            <span class="d-flex align-items-center" style="height: 32px;">
              <svg width="28" height="28" style="display:inline;vertical-align:middle;" viewBox="0 0 24 24" fill="none" stroke="var(--green1)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="top-divider"></div>
</div>
