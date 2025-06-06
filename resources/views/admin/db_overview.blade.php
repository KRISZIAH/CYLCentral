@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Overview'])

  <!-- partial/Welcome -->
  <div class="main-panel">
    <div class="content-wrapper p-4">
  <!-- partial/Welcome -->
  <div class="main-panel">
    <div class="content-wrapper p-4">
      <div class="row g-4">
        <div class="col-md-12 grid-margin">
          <div class="row align-items-center">
            <!-- Welcome Section -->
            <div class="col-12 col-xl-8 p-4 mb-4 mb-xl-0 header">
              <h3 class="font-weight-bold">Welcome Jennifer!</h3>
              <h6 class="font-weight-normal mb-0">Here’s your organization’s overview</h6>
            </div>

            <!-- Export Button Section -->
            <div class="col-12 col-xl-4 p-3">
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
        <div class="row g-4">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card card-tale">
              <div class="card-body bg-white text-center">
                <div class="text-center text-md-start mb-3 mb-md-0">
                  <p class="title">Flagship Programs</p>
                  <p class="mb-2 head">9</p>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2">
                  <img src="{{ asset('img/adal.png') }}" class="img-fluid program-logo" alt="ADAL Program">
                  <img src="{{ asset('img/programs/kordiarts.png') }}" class="img-fluid program-logo" alt="Kordiarts Program">
                  <img src="{{ asset('img/programs/siribs.png') }}" class="img-fluid program-logo" alt="SIRIBS Program">
                  <img src="{{ asset('img/programs/hope.png') }}" class="img-fluid program-logo" alt="HOPE Program">
                  <img src="{{ asset('img/programs/project_dalluyon.png') }}" class="img-fluid program-logo" alt="Project Dalluyon">
                  <img src="{{ asset('img/programs/dalluyon.png') }}" class="img-fluid program-logo" alt="Dalluyon Program">
                  <img src="{{ asset('img/programs/10kok.png') }}" class="img-fluid program-logo" alt="10KOK Program">
                  <img src="{{ asset('img/programs/sumya.png') }}" class="img-fluid program-logo" alt="Sumya Program">
                  <img src="{{ asset('img/programs/bannuar.png') }}" class="img-fluid program-logo" alt="Bannuar Program">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Events -->
        <div class="row g-4">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card card-tale">
              <div class="card-body bg-white text-center">
                <div class="d-flex justify-content-between">
                  <p class="title">Total Events</p>
                  <p class="text-muted fst-italic time">Last updated at 16:04</p>
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
            <!-- Total Funds -->
            <div class="row g-4">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body bg-white text-center">
                    <p class="mb-4 text-muted fst-italic time">Last updated at 16:04</p>
                    <p class="title">Total Funds</p>
                    <p class="fs-30 mb-2 head">
                      <i class="bi bi-cash-stack me-2"></i>₱550,080
                    </p>
                  </div>
                </div>
              </div>

              <!-- Average Rating -->
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body bg-white text-center">
                    <p class="mb-4 text-muted fst-italic time">Last updated at 16:04</p>
                    <p class="title">Average Rating</p>
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

            <!-- Physical Reach -->
            <div class="row g-4">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body bg-white text-center">
                    <p class="mb-4 text-muted fst-italic time">Last updated at 16:04</p>
                    <p class="title">Physical Reach</p>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-geo-alt fs-1 text-secondary me-3"></i>
                      <div>
                        <p class="fs-30 mb-2 head">6</p>
                        <p class="place">Provinces in Cordillera</p>
                        <p class="fs-30 mb-2 head">12</p>
                        <p class="place">Cities outside the region</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Digital Reach -->
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body bg-white text-center">
                    <p class="mb-4 text-muted fst-italic time">Last updated at 16:04</p>
                    <p class="title">Digital Reach</p>
                    <p class="fs-30 mb-2 head">
                      <i class="bi bi-cash-stack me-2"></i>₱45,320
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row g-4">
          <!-- Partner Groups -->
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card card-tale">
              <div class="card-body bg-white text-center">
                <div class="d-flex justify-content-between">
                  <p class="title">Partner Groups</p>
                  <p class="text-muted fst-italic time">Last updated at 16:04</p>
                </div>
                <p class="fs-30 fw-bold head">90</p>

                <!-- Donut Chart -->
                <div id="donutchart" class="donutchart"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              </div>
            </div>
          </div>

          <!-- Regular Members -->
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card card-tale">
              <div class="card-body bg-white text-center">
                <div class="d-flex justify-content-between">
                  <p class="title">Regular Members</p>
                  <p class="text-muted fst-italic time">Last updated at 16:04</p>
                </div>
                <p class="fs-30 fw-bold head">223</p>

                <!-- Conversation Chart -->
                <div id="chart_div"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
