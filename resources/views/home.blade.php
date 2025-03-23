
@extends('layouts.main')


@section('title', 'Home')


@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('{{ asset('images/hero-bg.png') }}');">
    <div class="container text-center text-white">
        <h1>Shaping <span class="text-coral">youth leaders</span> for<br>a sustainable future</h1>
        <a href="#" class="btn btn-primary mt-4">LEARN MORE</a>
    </div>
</section>


<!-- Topics -->
<section class="services-cards">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card service-card">
                    <div class="row g-0">
                        <div class="col-md-4 text-center py-3">
                            <div class="icon-container">
                                <i class="bi bi-book"></i>
                            </div>
                            <h5>Educational and Skills Development</h5>
                        </div>
                        <div class="col-md-4 text-center py-3 border-divider">
                            <div class="icon-container">
                                <i class="bi bi-people"></i>
                            </div>
                            <h5>Indigenous People's Education</h5>
                        </div>
                        <div class="col-md-4 text-center py-3">
                            <div class="icon-container">
                                <i class="bi bi-globe"></i>
                            </div>
                            <h5>Sustainable Development Goals</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Welcome Section -->
<section class="welcome-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/welcome.png') }}" alt="CYLC Event" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <div class="welcome-content">
                    <h6>Welcome to</h6>
                    <img src="{{ asset('images/cylcentral-logo3.png') }}" alt="CYLC logo" class="img">
                    <p>
                        CYLCentral is the official event and membership portal of the Cordillera Young Leaders Club (CYLC)—a platform where young leaders connect, grow, and create meaningful change in their communities. Whether you're looking to participate in events, develop leadership skills, or collaborate with like-minded individuals, you've come to the right place.
                    </p>
                    <a href="#" class="btn btn-secondary">ABOUT CYLC</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Leadership Journey Section -->
<section class="leadership-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 d-flex align-items-center">
                <div class="section-header">
                    <h6>Why Get Involved?</h6>
                    <h2>Your Leadership Journey Starts Here.</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-container">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <h5>Join exclusive events and training</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-container">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5>Connect with mentors and fellow leaders</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-container">
                        <i class="bi bi-award"></i>
                    </div>
                    <h5>Get certificates and official CYLC membership</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-container">
                        <i class="bi bi-bell"></i>
                    </div>
                    <h5>Stay updated with announcements and reminders</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-image">
                    <img src="{{ asset('images/get-involve.png') }}" alt="Leadership Event" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="services-images">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <img src="{{ asset('images/service-1.png') }}" alt="Service" class="img-fluid rounded">
                        </div>
                        <div class="col-6 pr-2">
                            <img src="{{ asset('images/service-2.png') }}" alt="Service" class="img-fluid rounded">
                        </div>
                        <div class="col-6 pl-2">
                            <img src="{{ asset('images/service-3.png') }}" alt="Service" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="services-content">
                    <h6>Services</h6>
                    <h2>Providing Opportunities for Growth.</h2>
                    <p>Offering impactful events that foster leadership, community engagement, and professional growth.</p>
                    <ul class="service-list">
                        <li><i class="bi bi-check-circle-fill"></i> Training & Workshops</li>
                        <li><i class="bi bi-check-circle-fill"></i> Conferences & Summits</li>
                        <li><i class="bi bi-check-circle-fill"></i> Community Engagement Programs</li>
                        <li><i class="bi bi-check-circle-fill"></i> Networking & Fellowship Events</li>
                        <li><i class="bi bi-check-circle-fill"></i> Webinars</li>
                        <li><i class="bi bi-check-circle-fill"></i> Flagship Programs</li>
                    </ul>
                    <a href="#" class="btn btn-secondary">EXPLORE EVENTS</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
