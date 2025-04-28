@extends('layouts.partials')

@section('content')
<div class="login d-flex justify-content-center align-items-center vh-100 " style="background-image: url('{{ asset('/img/login/login_bg.png') }}'); ">
    <div class="card p-4" style="width: 30rem;  background: rgba(255, 255, 255, 0.5); border-radius: 10px;">
        <h2 class="text-center custom-register-header">Create an Account</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required oninput="checkStrength(this.value)">
<div id="strength-message" class="mt-1"></div>
<small class="text-muted">Password must be at least 8 characters and include uppercase, lowercase, number, and special character.</small>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100">SIGN UP</button>
        </form>
        <p class="text-center custom-login-text">Already have an account? <a href="{{ route('login') }}">Log In</a></p>
    </div>
</div>
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

// --- Registration using API utility ---
async function registerUser(event) {
    event.preventDefault();
    const data = {
        name: document.querySelector('[name="first_name"]').value + ' ' + document.querySelector('[name="last_name"]').value,
        email: document.querySelector('[name="email"]').value,
        password: document.querySelector('[name="password"]').value,
        // Add more fields as needed
    };
    const result = await apiRequest('/api/register', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    });
    if (result && result.access_token) {
        localStorage.setItem('access_token', result.access_token);
        if (result.refresh_token) localStorage.setItem('refresh_token', result.refresh_token);
        window.location.href = '/profile';
    }
}
// Logout button logic (if present)
const logoutBtn = document.querySelector('.btn-danger, .logout-btn');
if (logoutBtn) logoutBtn.onclick = doLogout;

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

// Example: Async registration via API (update selectors as needed)
async function registerUser(event) {
    event.preventDefault();
    const data = {
        name: document.querySelector('[name="first_name"]').value + ' ' + document.querySelector('[name="last_name"]').value,
        email: document.querySelector('[name="email"]').value,
        password: document.querySelector('[name="password"]').value,
        // Add more fields as needed
    };
    try {
        const response = await fetch('/api/register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify(data),
        });
        const result = await response.json();
        if (response.ok) {
            alert('Registration successful!');
            // Optionally redirect or auto-login
        } else {
            alert(result.message || 'Registration failed.');
        }
    } catch (err) {
        alert('An error occurred: ' + err.message);
    }
}
// To use: <form onsubmit="registerUser(event)">
</script>
@endsection