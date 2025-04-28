@extends('layouts.main')

@section('content')

<section class="edit-profile">
    <h3 class="sidebar-title text-danger fw-bold">My Account</h3>

    <div class="container-fluid d-flex gap-4 primary-container">
        <!-- Sidebar -->
        <div class="sidebar p-4 rounded-3 bg-white shadow-sm col-md-3">
            <button class="btn btn-success w-100 mb-3 d-flex align-items-center">
                <i class="bi bi-pencil me-2"></i>Edit Profile
            </button>

            <button onclick="window.location='{{ route('files') }}';" class="btn btn-light w-100 mb-3 d-flex align-items-center">
                <i class="bi bi-folder me-2"></i> Files
            </button>

            <button class="btn btn-danger w-100 d-flex align-items-center">
                <i class="bi bi-box-arrow-right me-2"></i> Log Out
            </button>
        </div>

        <!-- Profile Section -->
        <div class="content p-4 rounded-3 shadow-sm bg-white col-md-9">
            <label>First Name</label>
            <div class="input-group">
                <input type="text" class="form-control rounded-3" id="firstName" value="{{ Auth::user()->first_name }}" disabled>
            </div>
        </div>

        <form id="profileForm">
            <div class="row">
                <div class="col-md-6 mb-3 labels">
                    <label>First Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-3" id="firstName" value="{{ Auth::user()->first_name }}" disabled>
                        <button type="button" class="btn btn-light edit-btn">✏️</button>
                    </div>
                </div>
                        <div class="col-md-6 mb-3 labels">
                            <label>First Name</label>
                            <div class="input-group">
                                @auth
                                    <input type="text" class="form-control rounded-3" id="firstName" value="{{ Auth::user()->first_name }}" disabled>
                                @else
                                    <input type="text" class="form-control rounded-3" id="firstName" value="" disabled>
                                @endauth
                                <button type="button" class="btn btn-light edit-btn">✏️</button>
                            </div>
                        </div>
                    </div>
                <label>Password</label>
                <div class="input-group">
                    <input type="password" class="form-control rounded-3" id="password" placeholder="New Password (leave blank to keep current)" disabled oninput="checkStrength(this.value)">
<div id="strength-message" class="mt-1"></div>
<small class="text-muted">Password must be at least 8 characters and include uppercase, lowercase, number, and special character.</small>
                    <button type="button" class="btn btn-light edit-btn">✏️</button>
                </div>
            </div>

            <div class="text-end">
                <button id="cancelBtn" type="button" class="btn btn-outline-danger d-none">CANCEL</button>
                <button id="saveBtn" type="submit" class="btn btn-danger">SAVE CHANGES</button>
            </div>
        </form>
    </div>
</section>
<!-- Modal for error messages -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-error-message"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
// --- API Utility with Token Refresh and Error Modal ---
async function apiRequest(url, options = {}, autoRedirect = true) {
    let token = localStorage.getItem('access_token');
    if (!options.headers) options.headers = {};
    if (token) options.headers['Authorization'] = 'Bearer ' + token;
    options.headers['Accept'] = 'application/json';
    let response = await fetch(url, options);
    // If token expired, try refresh (pseudo-code, implement if backend supports)
    if (response.status === 401 && localStorage.getItem('refresh_token')) {
        const refreshed = await tryRefreshToken();
        if (refreshed) {
            token = localStorage.getItem('access_token');
            options.headers['Authorization'] = 'Bearer ' + token;
            response = await fetch(url, options); // retry
        } else {
            doLogout();
            return null;
        }
    }
    if (!response.ok) {
        const result = await response.json().catch(() => ({}));
        showErrorModal(result.message || 'An error occurred.');
        if (autoRedirect && response.status === 401) doLogout();
        return null;
    }
    return await response.json();
}
// Token refresh logic (pseudo-code)
async function tryRefreshToken() {
    const refreshToken = localStorage.getItem('refresh_token');
    if (!refreshToken) return false;
    try {
        const resp = await fetch('/api/refresh', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({refresh_token: refreshToken})
        });
        const data = await resp.json();
        if (resp.ok && data.access_token) {
            localStorage.setItem('access_token', data.access_token);
            if (data.refresh_token) localStorage.setItem('refresh_token', data.refresh_token);
            return true;
        }
    } catch {}
    return false;
}
// Error modal
function showErrorModal(msg) {
    document.getElementById('modal-error-message').innerText = msg;
    const modal = new bootstrap.Modal(document.getElementById('errorModal'));
    modal.show();
}
// Secure logout
function doLogout() {
    localStorage.removeItem('access_token');
    localStorage.removeItem('refresh_token');
    window.location.href = '/login';
}

// --- Profile update using API utility ---
const profileForm = document.getElementById('profileForm');
if (profileForm) {
    profileForm.onsubmit = async function(event) {
        event.preventDefault();
        const data = {
            name: document.getElementById('firstName').value + ' ' + document.getElementById('lastName').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('contact').value,
        };
        const password = document.getElementById('password').value;
        if (password && password.length > 0) data.password = password;
        const result = await apiRequest('/api/user', {
            method: 'PUT',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data)
        });
        if (result) {
            alert('Profile updated! Redirecting...');
            window.location.href = '/profile';
        }
    }
}
// Logout button logic (if present)
const logoutBtn = document.querySelector('.btn-danger, .logout-btn');
if (logoutBtn) logoutBtn.onclick = doLogout;

// Enable editing fields
const editBtns = document.querySelectorAll('.edit-btn');
editBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        if (input) input.disabled = false;
    });
});

// Password strength meter
function checkStrength(password) {
    let message = '';
    let strong = 0;
    if (password.length >= 8) strong++;
    if (/[a-z]/.test(password)) strong++;
    if (/[A-Z]/.test(password)) strong++;
    if (/[0-9]/.test(password)) strong++;
    if (/[^a-zA-Z0-9]/.test(password)) strong++;
    if (strong <= 2) {
        message = '<span style="color:#e00">Weak password</span>';
    } else if (strong === 3 || strong === 4) {
        message = '<span style="color:#e6a700">Medium password</span>';
    } else if (strong === 5) {
        message = '<span style="color:#0a0">Strong password</span>';
    }
    document.getElementById('strength-message').innerHTML = message;
}

// Async profile update via API
const profileForm = document.getElementById('profileForm');
if (profileForm) {
    profileForm.onsubmit = async function(event) {
        event.preventDefault();
        const token = localStorage.getItem('access_token');
        const data = {
            name: document.getElementById('firstName').value + ' ' + document.getElementById('lastName').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('contact').value,
        };
        const password = document.getElementById('password').value;
        if (password && password.length > 0) data.password = password;
        try {
            const response = await fetch('/api/user', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token
                },
                body: JSON.stringify(data)
            });
            const result = await response.json();
            if (response.ok) {
                alert('Profile updated! Redirecting...');
                // Optionally update localStorage with new token if backend issues a new one
                window.location.href = '/profile';
            } else {
                alert(result.message || 'Update failed.');
            }
        } catch (err) {
            alert('An error occurred: ' + err.message);
        }
    }
}

// Auto-login/redirect after registration example (to be placed in registration page if desired):
// if (result.access_token) {
//     localStorage.setItem('access_token', result.access_token);
//     window.location.href = '/profile';
// }
</script>
@endsection


