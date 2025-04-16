@extends('layouts.main')


@section('content')

    <!-- Hero Section -->
    <section id="hero" class="herosection" style="background-image: url({{ asset('img/membership_page/membership.png') }}); background-size: cover;">
    <div class="membership-section">
          <div class="membership-content">
              Membership
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
                                  <img src="{{ asset('img/membership_page/CYLC logo.png') }}" alt="CYLC Logo">
                                  <div>
                                      <span class="title">Transformational Leadership:</span><br>
                                      <span class="subtitle">Think Globally, Act Locally.</span>
                                  </div>
                              </div>
                                  <p class="content">
                                    Your passion for leadership and service is what makes a difference in our communities.
                                    <span class="highlight">
                                        Leadership is not just about titles—it’s about taking action, inspiring others, and creating positive change.
                                    </span>
                                    Be part of CYLC, where every small effort counts, and together, we can empower others and build a better future.
                                    We look forward to growing, learning, and making an impact with you! <strong>Think Globally, Act Locally!</strong>
                                </p>
                            </div> <!-- End of stat-item -->
                        </div> <!-- End of row g-0 -->
                    </div> <!-- End of card -->
                </div> <!-- End of col-md-12 -->
            </div> <!-- End of row -->
        </div> <!-- End of container -->
    </section> <!-- End of services-cards -->   



    <!-- Benefits Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="{{ asset('img/membership_page/image 60.png') }}" alt="Business Meeting" class="img-fluid main-image rounded-4">
                <img src="{{ asset('img/membership_page/image 60.png') }}" alt="Team Discussion" class="img-fluid small-image rounded-4">
              </div>
              <div class="experience-badge floating">
                <h3>3+ <span>Years</span></h3>
                <p>Of experience in business service</p>
              </div>
            </div>
          </div>


          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">BENEFITS</span>
            <h2 class="about-title">WHY BECOME A CYLC MEMBER?</h2>


            <div class="row feature-list-wrapper">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Free or discounted upskilling, mental health, and leadership training</li>
                  <li><i class="bi bi-check-circle-fill"></i> Priority access to networking, mentorship, and special events</li>
                  <li><i class="bi bi-check-circle-fill"></i> Exclusive opportunities for community projects, advocacy, and volunteering</li>
                  <li><i class="bi bi-check-circle-fill"></i> Member-only resources, free merchandise, and leadership roles</li>
                  <li><i class="bi bi-check-circle-fill"></i> Funded tours and group eat-outs to foster camaraderie</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->


   
    <!-- Membership Requirement Section -->
    <section id="Membership" class="Membership section">


      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Membership Requirement</h2>
        <p>Choose Your Membership</p>
      </div><!-- End Section Title -->


      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box ">
              <h4>Membership Type</h4>
            </div>


            <div class="membership-box1">
              <span>Regular Member</span>
            </div>


            <div class="membership-box2">
              <span>Renewal (Regular)</span>
            </div>
          </div><!-- End Feature Borx-->


          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box ">
              <h4>Eligibility</h4>
            </div>


            <div class="membership-box1">
              <span>Cordilleran youth (18-35 years old)</span>
            </div>


            <div class="membership-box2">
              <span>Existing CYLC members renewing for the year</span>
            </div>
          </div><!-- End Feature Borx-->


          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box ">
              <h4>Membership Fee</h4>
            </div>


            <div class="membership-box1">
              <span>PHP 100</span>
            </div>


            <div class="membership-box2">
              <span>PHP 100</span>
            </div>


          </div><!-- End Feature Borx-->


          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box ">
              <h4>Application Attachments</h4>
            </div>


            <div class="membership-box1">
              <span>Clear half-body photo</span>
            </div>


            <div class="membership-box2">
              <span>Clear half-body photo</span>
            </div>
          </div>
         
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box ">
              <h4>Inclusions</h4>
            </div>


            <div class="membership-box1 ">
              <span>CYLC ID, Certificate of Membership</span>
            </div>


            <div class="membership-box2 ">
              <span>CYLC ID, Certificate of Membership</span>
            </div>
          </div><!-- End Feature Borx-->
        </div>
      </div>
    </section><!-- /Features Cards Section -->


    <!-- Steps -->
    <section id="how-to-apply">
      <!-- Section Title -->


      <div class="apply-section">
        <div class="container section-title" data-aos="fade-up">
          <h2>How to Apply</h2>
          <p class="sub"> Follow these simple steps in becoming a member!</p>


            <div class="row mt-4">
                  <div class="col-md-2 offset-md-1 step">
                      <span class="step-number">1</span>
                      <hr>
                      <p class="step-title">Fill out the Application Form</p>
                      <p>Complete the online form with your details.</p>
                  </div>
 
                  <div class="col-md-2 step">
                      <span class="step-number">2</span>
                      <hr>
                      <p class="step-title">Attach Required Documents</p>
                      <p>Upload a clear profile photo.</p>
                  </div>
 
                  <div class="col-md-2 step">
                      <span class="step-number">3</span>
                      <hr>
                      <p class="step-title">Pay the Membership Fee</p>
                      <p>Send fee via the designated payment method.</p>
                  </div>
 
                  <div class="col-md-2 step">
                      <span class="step-number">4</span>
                      <hr>
                      <p class="step-title">Wait for Confirmation</p>
                      <p>Your application will be reviewed, and you’ll be notified upon approval.</p>
                  </div>
 
                  <div class="col-md-2 step">
                      <span class="step-number">5</span>
                      <hr>
                      <p class="step-title">Get <br>Inclusions</p>
                      <p>Receive your CYLC ID and Certificate of Membership.</p>
                  </div>
              </div>
 
              <button class="apply-btn mt-4">CLICK HERE TO APPLY</button>
          </div>
      </div>
    </div>
  </section>
  @endsection