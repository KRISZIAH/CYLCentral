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
        <!-- Profile Section -->
    <div class="content p-4 rounded-3 shadow-sm bg-white col-md-9">
        <div class="profile-header text-center">
            <div class="position-relative profile-pic-container">
                <img id="profile-pic" src="profile.jpg" alt="Profile Picture" class="profile-pic rounded-circle border">
                <label for="profile-upload" class="upload-icon position-absolute bottom-0 end-0 p-1 rounded-circle">
                    📷
                </label>
                <input type="file" id="profile-upload" accept="image/*" class="d-none">
            </div>
            <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
            <p>Membership ID: CYLC-{{ date('Y') }}{{ str_pad(Auth::user()->id, 6, '0', STR_PAD_LEFT) }}</p>
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
                    <label>Last Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-3" id="lastName" value="{{ Auth::user()->last_name }}" disabled>
                        <button type="button" class="btn btn-light edit-btn">✏️</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 labels">
                    <label>Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control rounded-3" id="email" value="{{ Auth::user()->email }}" disabled>
                        <button type="button" class="btn btn-light edit-btn">✏️</button>
                    </div>
                </div>

                <div class="col-md-6 mb-3 labels">
                    <label>Contact Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-3" id="contact" value="{{ Auth::user()->phone }}" disabled>
                        <button type="button" class="btn btn-light edit-btn">✏️</button>
                    </div>
                </div>
            </div>

            <div class="mb-3 labels">
                <label>Password</label>
                <div class="input-group">
                    <input type="password" class="form-control rounded-3" id="password" value="************" disabled>
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
@endsection


