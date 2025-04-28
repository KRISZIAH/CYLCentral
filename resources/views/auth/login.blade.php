@extends('layouts.partials')

@section('content')

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showCustomToast(@json(session('success')));
        });
    </script>
@endif

<section class="login_section">
<div class="login d-flex justify-content-center align-items-center vh-100 " style="background-image: url('{{ asset('/img/login/login_bg.png') }}'); ">
    <div class="card p-4 shadow-lg " style="width: 25rem; background: rgba(255, 255, 255, 0.5); border-radius: 10px;">
        <h3 class="text-center custom-login-header">Log in your Account</h3>
        <p class="text-center custom-login-text">Don't have an account? <a href="{{ route('register') }}" class="text-success">Sign up</a></p>

        @if($errors->has('login_error'))
            <div class="alert alert-danger">
                {{ $errors->first('login_error') }}
            </div>
        @endif
        
        <form id="loginForm" onsubmit="loginUser(event)">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email or Phone Number</label>
                <input type="text" class="form-control" id="email" name="email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div id="login-error" class="text-danger mb-2"></div>
<button type="submit" class="btn btn-success w-100 mt-3">LOG IN</button>
        </form>
    </div>
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
// --- Login using API utility ---
async function loginUser(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const token = document.querySelector('input[name="_token"]').value;
    const result = await apiRequest('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ email, password })
    }, false);
    if (result && result.access_token) {
        localStorage.setItem('access_token', result.access_token);
        if (result.refresh_token) localStorage.setItem('refresh_token', result.refresh_token);
        window.location.href = '/dashboard';
    }
}
// Logout button logic (if present)
const logoutBtn = document.querySelector('.btn-danger, .logout-btn');
if (logoutBtn) logoutBtn.onclick = doLogout;
</script>
@endsection
