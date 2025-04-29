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

<section class="membership-registration">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <!-- Section 1: Personal Details -->
                    <div class="section-head">
                        <h2 class="section-title">Personal details</h2>
                    </div>

                    <div class="form-container">
                        <form id="membershipForm">
                            <div class="form-section">
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label for="firstName" class="form-label required-field">First Name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="middleInitial" class="form-label">Middle Initial</label>
                                        <input type="text" class="form-control" id="middleInitial" maxlength="1">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="lastName" class="form-label required-field">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label for="birthdate" class="form-label required-field">Birthdate</label>
                                        <input type="date" class="form-control" id="birthdate" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label for="employmentStatus" class="form-label required-field">Employment Status</label>
                                        <select class="form-select" id="employmentStatus" required>
                                            <option value="" selected disabled>Select here</option>
                                            <option value="employed">Employed</option>
                                            <option value="student">Student</option>
                                            <option value="self-employed">Self-employed</option>
                                            <option value="unemployed">Unemployed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="companyInstitution" class="form-label required-field">Company/Institution</label>
                                        <input type="text" class="form-control" id="companyInstitution" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label for="contactNumber" class="form-label required-field">Contact Number</label>
                                        <div class="phone-input">
                                            <input type="text" class="form-control phone-prefix" value="+63" readonly>
                                            <input type="tel" class="form-control" id="contactNumber" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="region" class="form-label required-field">Region</label>
                                        <select class="form-select" id="region" required>
                                            <option value="" selected disabled>Select here</option>
                                            <option value="CAR">Cordillera Administrative Region (CAR)</option>
                                            <option value="NCR">National Capital Region (NCR)</option>
                                            <!-- Add more regions as needed -->
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="province" class="form-label required-field">Province</label>
                                        <select class="form-select" id="province" required disabled>
                                            <option value="" selected disabled>Select here</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="municipalityCity" class="form-label required-field">Municipality/City</label>
                                        <select class="form-select" id="municipalityCity" required disabled>
                                            <option value="" selected disabled>Select here</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <!-- Section 2: Member Commitment and Engagement -->
                    <div class="section-head">
                        <h2 class="section-title">Member Commitment and Engagement</h2>
                    </div>

                    <div class="form-container">
                        <form id="commitmentForm">
                            <div class="form-section">                            
                            <div class="mb-3">
                                <label class="form-label required-field">Which programs of CYLC are you most interested in? (Select 1-2 programs only)</label>
                                <div class="custom-select-wrapper">
                                    <select class="form-select program-select" id="programSelect" required>
                                        <option value="" selected disabled>Select programs here</option>
                                        <option value="Youth Leadership">Youth Leadership</option>
                                        <option value="Community Service">Community Service</option>
                                        <option value="Skills Development">Skills Development</option>
                                        <option value="Environmental Advocacy">Environmental Advocacy</option>
                                    </select>
                                </div>
                                <div id="selectedProgramsContainer" class="selected-programs mt-2"></div>
                                <div class="invalid-feedback">Please select 1-2 programs</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="activities" class="form-label required-field">What specific activities, events, or projects you would like to participate in, lead, or implement for the public as a CYLC member?</label>
                                <textarea class="form-control" id="activities" rows="2" required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="commitment" class="form-label required-field">What is your commitment or vision for the organization as a future transformative leader of Cordillera Young Leaders Club?</label>
                                <textarea class="form-control" id="commitment" rows="2" required></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                    <!-- Section 3: Profile Verification -->
                    <div class="section-head">
                        <h2 class="section-title">Profile Verification</h2>
                    </div>

                    <div class="form-container">
                        <form id="verificationForm">
                            <div class="form-section">
                                <div class="mb-3">
                                    <label class="form-label required-field">Please upload any clear photo of yourself (half body shot - can be formal or casual)</label>
                                    <div class="upload-box">
                                        <p class="text-center text-muted">Upload here 1 supported file. Max 10 MB</p>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-success">UPLOAD FILE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Section 4: Payment -->
                    <div class="section-head">
                        <h2 class="section-title">4 Payment</h2>
                    </div>

                    <div class="form-container">
                        <form id="paymentForm">
                            <div class="form-section">
                                <div class="mb-3">
                                    <label class="form-label required-field">Please pay your application fee of One Hundred Pesos (PHP 100.00)</label>
                                    
                                    <div class="payment-options">
                                        <div class="payment-option">
                                            <input type="radio" class="form-check-input" name="paymentMethod" id="paymongo" checked>
                                            <label class="form-check-label" for="paymongo">
                                                PayMongo
                                                <img src="{{ asset('img/payment/paymongo-logo.png') }}" alt="PayMongo" class="payment-logo">
                                            </label>
                                            <p class="payment-note">After clicking "Pay now", you will be redirected to Secure Payments via PayMongo to complete your payment securely.</p>
                                        </div>

                                        <div class="payment-option">
                                            <input type="radio" class="form-check-input" name="paymentMethod" id="uploadProof">
                                            <label class="form-check-label" for="uploadProof">Upload Proof of Payment</label>
                                        </div>
                                    </div>

                                    <div class="payment-total">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>Total</span>
                                            <span class="total-amount">₱ 100.00</span>
                                        </div>
                                        <div class="text-end mt-3">
                                            <button type="button" class="btn btn-success">PAY NOW</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary me-2">SUBMIT APPLICATION</button>
                            <button type="button" class="btn btn-outline-secondary">CLEAR FORM</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

@endsection
