@extends('layouts.main')

@section('content')
 <!-- Section 1 -->
 <section class="section-1" style="background-image: url('{{ asset('img/about/about_us.png') }}');">
    <h1>About Us</h1>
    <div class="line"></div>
  </section>


  <!-- Section 2 -->
  <section class="section-2 py-5" >
    <div class="container">
      <div class="floating-container">
        <img src="img\logos\CYLC logo.png" class="img-fluid mb-3 center-image" alt="Banner">
        <p>The <span>Cordillera Young Leaders Club (CYLC) is a region-wide non-government organization</span> founded in February 2023 with the goal of shaping young leaders into catalysts for change. CYLC brings together Cordilleran youth aged 18-35 from diverse backgrounds, united by a passion for leadership and community development. Through transformational leadership, CYLC empowers young individuals to lead, innovate, and create sustainable solutions to pressing challenges in the region.</p>
        <div class="row">
          <div class="col-md-6 text-car">
            <p>We operate across all provinces and the chartered city of the <span>Cordillera Administrative Region (CAR):</span></p>
            <ol>
              <li>Abra</li>
              <li>Apayao</li>
              <li>Baguio City</li>
              <li>Benguet</li>
              <li>Ifugao</li>
              <li>Kalinga</li>
              <li>Mountain Province</li>
            </ol>
          </div>
          <div class="col-md-5">
            <img src="img\about\about_map.png" class="img-fluid" alt="Side">
          </div>
        </div>
      </div>


      <div class="row mt-5 micc vision-mission">
        <div class="col-md-6">
          <h3>Mission</h3>
          <p>To provide leadership opportunities for the Cordilleran youth to create innovative and sustainable developments for the region.</p>
        </div>
        <div class="col-md-6">
          <h3>Vision</h3>
          <p>To be the largest region-wide organization championing the Sustainable Development Goals and Indigenous People's Education through transformational leadership.</p>
        </div>
      </div>


      <div class="row mt-4">
        <div class="col-12 col-md-3 our-advocacy mb-4 mb-md-0">
          <h4 class="text-brown">Our Advocacy</h4>
          <h2 class="text-green1">We Organize Projects Anchored on:</h2>
        </div>
        <div class="col-12 col-md-3 mb-4 mb-md-0">
          <div class="img-text">
            <img src="img\about\advocacy_one.png" class="img-fluid" alt="Img1">
            <span>Educational and Skills Development</span>
          </div>
        </div>
        <div class="col-12 col-md-3 mb-4 mb-md-0">
          <div class="img-text">
            <img src="img\about\advocacy_two.png" class="img-fluid" alt="Img2">
            <span>Indigenous People's Education</span>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="img-text">
            <img src="img\about\advocacy_three.png" class="img-fluid" alt="Img3">
            <span>Sustainable Development Goals</span>
          </div>
        </div>
      </div>
  </section>


  <!-- Section 3 -->
  <section class="section-3 py-5 bg-light">
    <div class="container">
      <h3 class="mb-3">Objectives</h3>
      <h2 class="mb-5">CYLC aims to empower youth and promote regional development through:</h2>
      <div class="row">
        <div class="col-md-6">
          <p class="d-flex align-items-center"><span class="material-icons me-2">check_circle</span>Develop the leadership skills of Cordilleran youth by providing capacity development training.</p>
          <p class="d-flex align-items-center"><span class="material-icons me-2">check_circle</span>Mobilize the youth to organize community projects that address societal-based issues.</p>
          <p class="d-flex align-items-center"><span class="material-icons me-2">check_circle</span>Promote inclusive youth participation to fulfill their vital role in nation-building.</p>
          <p class="d-flex align-items-center"><span class="material-icons me-2">check_circle</span>Encourage potential youth volunteers to participate in the projects of the organization.</p>
        </div>
        <div class="col-md-6">
          <p class="d-flex align-items-center"><span class="material-icons me-2">check_circle</span>Sustain the organization's programs through partnerships and fundraising activities.</p>
          <p class="d-flex align-items-center"><span class="material-icons me-2">check_circle</span>Advocate the Sustainable Development Goals.</p>
          <p class="d-flex align-items-center"><span class="material-icons me-2">check_circle</span>Undertake other activities not contrary to the laws of the Republic of the Philippines.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- Section 4 -->
  <section class="section-4">
    <img src="img\about\programs_banner.png" class="banner-img" alt="Banner">
    <div class="container py-5">
      <div class="row align-items-center programs">
        <div class="col-md-6">
          <img src="images\our_programs.png" class="img-fluid" alt="Program">
        </div>
        <div class="col-md-6 right">
          <h3>Our Programs</h3>
          <h2>9 Flagship Programs, Countless Opportunities</h2>
          <p>CYLC organizes programs on skills development, environmental protection, mental health, public health, gender equality, arts, sports, and entrepreneurship. These programs host trainings, workshops, medical missions, and community initiatives, extending their impact across the Cordillera region and beyond through webinars.</p>
          <button class="btn btn-brown mt-3">Start Now</button>
        </div>
      </div>
    </div>
  </section>



@endsection