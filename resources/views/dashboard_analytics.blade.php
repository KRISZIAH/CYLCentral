@extends('layouts.main')


@section('content')
<div class="container-fluid p-3">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 align-items-center">
              <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Overview
              </li>
            </ol>
        </nav>


        <!-- User Profile Section -->
        <div class="d-flex align-items-center">
            <div class="nav-icons">
                <i class="bi bi-chat-dots"></i>
                <i class="bi bi-bell"></i>
            </div>
            <div class="user-info">
                <img src="https://via.placeholder.com/35" alt="Profile" class="profile-img">
                <div class="ms-2">
                    <div class="user-name">Jennifer Moltio</div>
                    <div class="user-role">Admin</div>
                </div>
            </div>
                </div>
            </div>
        </div>

        <!-- partial/Welcome -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0 header">
                    <h3 class="font-weight-bold">Welcome Jennifer</h3>
                    <h6 class="font-weight-normal mb-0">Here’s your organization’s overview</h6>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="button flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn-export-pdf">
                                <i class="bi bi-file-earmark-pdf"></i> Export to PDF
                            </button>
                        </div>
                    </div>
                </div>
           </div>
          </div>

            <!-- KPI Section -->
              <!-- Flagship Programs -->
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card card-tale">
                        <div class="card-body d-flex bg-white align-items-center justify-content-between">
                            <div>
                              <p class="fw-bold">Flagship Programs</p>
                              <p class="fs-30 fw-bold head">9</p>
                              </div>
                            <div class="d-flex flex-wrap align-items-center ">
                                <img src="{{ asset('img/adal.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/kordiarts.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/siribs.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/hope.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/project_dalluyon.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/dalluyon.png') }}" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/10kok.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/sumya.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                              <img src="{{ asset('img/programs/bannuar.png') }}" class="img-fluid" alt="Flagship Programs Logos">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Events -->
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card card-tale">
                    <div class="card-body bg-white">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Total Events</p>
                            <p class="text-muted fst-italic">Last updated at 16:04</p>
                        </div>
                        <p class="fs-30 mb-2 head">223</p>
     
                        <!-- Bar Chart Canvas -->
                        <div id="barchart_values" class="barchart"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    </div>
                </div>
              </div>


                <!-- 4 boxes -->
                <div class="col-md-6 grid-margin transparent">


                <!-- Total Funds (Today's Booking) -->
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body bg-white">
                        <p class="mb-4 text-muted fst-italic">Last updated at 16:04</p>
                        <p>Total Funds</p>
                        <p class="fs-30 mb-2 head">
                          <i class="bi bi-cash-stack me-2"></i>₱550,080
                      </p>
                      </div>
                    </div>
                  </div>


                  <!-- Average booking (Total Booking) -->
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body bg-white ">
                        <p class="mb-4 text-muted fst-italic">Last updated at 16:04</p>
                        <p>Average Rating</p>
                        <p class="fs-30 mb-2 head">
                          4.47
                          <i class="bi bi-star-fill text-warning fs-6"></i>
                          <i class="bi bi-star-fill text-warning fs-6"></i>
                          <i class="bi bi-star-fill text-warning fs-6"></i>
                          <i class="bi bi-star-fill text-warning fs-6"></i>
                          <i class="bi bi-star text-warning fs-6"></i>
                      </p>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Physical reach (Total Booking) -->
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body bg-white">
                            <p class="mb-4 text-muted fst-italic">Last updated at 16:04</p>
                            <p>Physical Reach</p>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-geo-alt fs-1 text-secondary me-3"></i>
                                <div>
                                    <p class="fs-30 mb-2 head">6</p>
                                    <p>Provinces in Cordillera</p>
                                    <p class="fs-30 mb-2 head">12</p>
                                    <p>Cities outside the region</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>


                  <!-- Digital Reach (Total Booking) -->
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body bg-white">
                        <p class="mb-4 text-muted fst-italic">Last updated at 16:04</p>
                        <p>Digital reach</p>
                        <p class="fs-30 mb-2 head">
                          <i class="bi bi-cash-stack me-2"></i>₱45,320
                      </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">


              <!-- Partner Groups -->
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card card-tale">
                    <div class="card-body bg-white">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Partner Groups</p>
                            <p class="text-muted fst-italic">Last updated at 16:04</p>
                        </div>
                        <p class="fs-30 fw-bold head">90</p>
       
                        <!-- Bar Chart Canvas/ EDIT SIZE NA LANG IF EVER -->
                        <div id="donutchart" class="donutchart"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    </div>
                </div>
                </div>


                <!-- Regular Members  -->
                <div class="col-md-6 grid-margin stretch-card">
                <div class="card card-tale ">
                    <div class="card-body bg-white">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Regular Members</p>
                            <p class="text-muted fst-italic">Last updated at 16:04</p>
                        </div>
                        <p class="fs-30 fw-bold head">223</p>
                     
                        <!-- Conversation Chart -->
                        <div id="chart_div" ></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    </div>
                </div>
                </div>


             
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection
