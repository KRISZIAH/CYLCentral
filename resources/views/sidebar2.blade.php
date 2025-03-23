


@extends('layouts.main')

@section('content')

<div class="container-fluid d-flex gap-4 primary-container">
        <!-- Sidebar -->
        <div class="sidebar p-4 rounded-3 shadow-sm col-md-3">
        <button class="btn btn-success w-100 mb-3 d-flex align-items-center">
                <i class="bi bi-pencil me-2"></i>Edit Profile
            </button>
            <button class="btn btn-light w-100 mb-3 d-flex align-items-center">
                <i class="bi bi-folder me-2"></i> Files
            </button>        
            <button class="btn btn-danger w-100 d-flex align-items-center">
                <i class="bi bi-box-arrow-right me-2"></i> Log Out
            </button>
        </div>
</div>