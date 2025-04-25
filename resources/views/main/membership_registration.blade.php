@extends('layouts.main')

@section('content')

<!-- Hero Section -->
<section id="hero" class="herosection" style="background-image: url({{ asset('img/membership_page/membership.png') }}); background-size: cover;">
    <div class="membership_reg-section">
        <div class="membership_reg-content">
            Membership Application Form
            <div class="underline"></div>
        </div>
    </div>
</section>

<section class="services-cards">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card service-card">
                    <div class="row g-0">
                        <div class="stat-item1">
                            <div class="logo">
                                <img src="{{ asset('img/membership_page/CYLC logo.png') }}" alt="CYLC Logo" style="width: 270px;">
                                <div>
                                    <span class="title">Transformational Leadership:</span><br>
                                    <span class="subtitle">Think Globally, Act Locally.</span>
                                </div>
                            </div>
                            <p class="content">
                                Thank you for your interest in becoming a member of CYLC. Kindly fill out the form completely and accurately.
                            </p>
                        </div> <!-- End of stat-item -->
                    </div> <!-- End of row g-0 -->
                </div> <!-- End of card -->
            </div> <!-- End of col-md-12 -->
        </div> <!-- End of row -->
    </div> <!-- End of container -->
</section>

@endsection
