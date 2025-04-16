@extends('layouts.partials')

@section('content')

@if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(function() {
            let alertBox = document.getElementById('success-alert');
            if (alertBox) {
                alertBox.classList.remove('show'); // Bootstrap hide animation
                setTimeout(() => alertBox.remove(), 500); // Remove it completely after fade-out
            }
        }, 3000);
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
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email or Phone Number</label>
                <input type="text" class="form-control" id="email" name="email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">LOG IN</button>
        </form>
    </div>
</div>
</section>
@endsection
