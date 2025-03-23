
@extends('layouts.main')

@section('content')

<section>
    <h3 class="sidebar-title">My Account</h3>

    <div class="container-fluid d-flex gap-4 primary-container">
        <!-- Sidebar -->
        <div class="sidebar p-4 rounded-3 shadow-sm col-md-3">
            <button onclick="window.location='{{ route('editprofile') }}';" class="btn btn-light w-100 mb-3 d-flex align-items-center">
                <i class="bi bi-pencil me-2"></i>Edit Profile
            </button>

            <button class="btn btn-success w-100 mb-3 d-flex align-items-center">
                <i class="bi bi-folder me-2"></i> Files
            </button>

            <button class="btn btn-danger w-100 d-flex align-items-center">
                <i class="bi bi-box-arrow-right me-2"></i> Log Out
            </button>
        </div>



    <!-- All Files -->
    <div class="content p-4 rounded-3 shadow-sm bg-white col-md-9">
    <div class="row">
            <!-- Main Content -->
            <div class="content col-md-9 col-lg-10 ms-sm-auto px-md-4">
                <div class="py-4">
                    <h3 class="secondary">All Files</h3>

                    <div class="file-grid row g-3">
                        <!-- File Item -->
                        <div class="file-item col-md-4 col-lg-3">
                            <a href="viewfile.html?file=AdaliKordilyera_Ecert.pdf" class="card text-center text-decoration-none shadow-sm">
                                <div class="card-body">
                                <img src="{{ asset('img/Document.png') }}" class="mb-2" alt="PDF" width="50">
                                <span class="badge bg-danger">PDF</span>
                                    <p class="text-dark small mt-2">AdaliKordilyera_Ecert.pdf</p>
                                </div>
                            </a>
                        </div>

                        <div class="file-item col-md-4 col-lg-3">
                            <a href="viewfile.html?file=CYLC_Member_ID.jpg" class="card text-center text-decoration-none shadow-sm">
                                <div class="card-body">
                                    <img src="{{ asset('img/Document.png') }}" class="mb-2" alt="PDF" width="50">
                                    <span class="badge bg-warning text-dark">JPG</span>
                                    <p class="text-dark small mt-2">CYLC_Member_ID.jpg</p>
                                </div>
                            </a>
                        </div>

                        <div class="file-item col-md-4 col-lg-3">
                            <a href="viewfile.html?file=AdaliKordilyera_Ecert.pdf" class="card text-center text-decoration-none shadow-sm">
                                <div class="card-body">
                                <img src="{{ asset('img/Document.png') }}" class="mb-2" alt="PDF" width="50">
                                <span class="badge bg-danger">PDF</span>
                                    <p class="text-dark small mt-2">AdaliKordilyera_Ecert.pdf</p>
                                </div>
                            </a>
                        </div>

                        <div class="file-item col-md-4 col-lg-3">
                            <a href="viewfile.html?file=CYLC_Member_ID.jpg" class="card text-center text-decoration-none shadow-sm">
                                <div class="card-body">
                                <img src="{{ asset('img/Document.png') }}" class="mb-2" alt="PDF" width="50">
                                <span class="badge bg-warning text-dark">JPG</span>
                                    <p class="text-dark small mt-2">CYLC_Member_ID.jpg</p>
                                </div>
                            </a>
                        </div>

                        <div class="file-item col-md-4 col-lg-3">
                            <a href="viewfile.html?file=AdaliKordilyera_Ecert.pdf" class="card text-center text-decoration-none shadow-sm">
                                <div class="card-body">
                                <img src="{{ asset('img/Document.png') }}" class="mb-2" alt="PDF" width="50">
                                <span class="badge bg-danger">PDF</span>
                                    <p class="text-dark small mt-2">AdaliKordilyera_Ecert.pdf</p>
                                </div>
                            </a>
                        </div>

                        <div class="file-item col-md-4 col-lg-3">
                            <a href="viewfile.html?file=CYLC_Member_ID.jpg" class="card text-center text-decoration-none shadow-sm">
                                <div class="card-body">
                                <img src="{{ asset('img/Document.png') }}" class="mb-2" alt="PDF" width="50">
                                <span class="badge bg-warning text-dark">JPG</span>
                                    <p class="text-dark small mt-2">CYLC_Member_ID.jpg</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection