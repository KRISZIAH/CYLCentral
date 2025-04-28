
@extends('layouts.main')

@section('content')

<!-- Events Section -->
<section class="pages_section">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-custom text-white text-center">
            <h4><span>EPISODE 42:</span> LABOR LAWS ON COMPENSATION, BENEFITS, LEAVES AND GRIEVANCES</h4>
        </div>
        <div class="card-body1">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('img/event_pages/poster1.png') }}" alt="Static Image" class="static-img">
                </div>
                <div class="col-md-8 event-details">
                    <button class="btn btn-outline-success mb-3">Adal Kordilyera</button>
                    <p>A webinar on labor laws, covering compensation, benefits, leaves, and grievances. Led by <span>Atty. Leandro P. Celles</span>, this session will provide in-depth insights into labor rights, workplace ethics, and legal remedies for employees and employers.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span>Date:</span> Thursday, January 30, 2025</li>
                        <li class="list-group-item"><span>Time:</span> 6:00 PM - 8:00 PM</li>
                        <li class="list-group-item"><span>Venue:</span> Zoom</li>
                        <li class="list-group-item"><span>Registration Fee:</span> 50 Pesos</li>
                        <li class="list-group-item"><span>Inclusions:</span> E-certificate</li>
                    </ul>
                    <div class="text-start mt-3">
                        <a href="{{ route('eventregispage') }}" class="custom-btn">REGISTER HERE</a>
                    </div>


                <div class="accordion" id="eventAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#details" aria-expanded="false" aria-controls="details">
                                Registration Details
                            </button>
                        </h2>
                        <div id="details" class="accordion-collapse collapse" aria-labelledby="headingOne" 
                            data-bs-parent="#eventAccordion">
                            <div class="accordion-body">
                                Details on how to register...
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#guidelines" aria-expanded="false" aria-controls="guidelines">
                                Event Guidelines
                            </button>
                        </h2>
                        <div id="guidelines" class="accordion-collapse collapse" aria-labelledby="headingTwo" 
                            data-bs-parent="#eventAccordion">
                                <div class="accordion-body">
                                    Guidelines for attendees...
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ratings & Feedback Section -->
<div class="container py-4">
    <div class="row align-items-center mb-3">
        <div class="col-md-6">
            <h5 class="text-uppercase text-danger fw-bold">Ratings & Feedback</h5>
            <div class="d-flex align-items-center">
                <div class="text-warning fs-4">★★★★★</div>
                <span class="ms-2">Based on 10 reviews</span>
            </div>
        </div>
        <div class="col-md-6 text-md-end">
            <button class="btn btn-outline-danger">WRITE A REVIEW</button>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="text-warning fs-5">★★★★★</div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-secondary me-2" style="width: 20px; height: 20px;"></div>
                        <strong>John D.</strong>
                    </div>
                    <small class="text-muted">January 31, 2024</small>
                </div>
                <p class="mt-2">Atty. Celles was an engaging speaker, and the session was a helpful guide for me as I review for a certification...</p>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="text-warning fs-5">★★★★☆</div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-secondary me-2" style="width: 20px; height: 20px;"></div>
                        <strong>William</strong>
                    </div>
                    <small class="text-muted">January 31, 2024</small>
                </div>
                <p class="mt-2">Ang galing ni Atty. sana sa susunod 5 hours.</p>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3"> <!-- Changed to justify-content-end -->
    <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">❮</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">❯</a></li>
            </ul>
        </nav>
    </div>
</div>
</section>
@endsection