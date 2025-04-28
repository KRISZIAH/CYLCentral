@extends('layouts.main')

@section('content')
<section id="hero" class="hero section" style="background-image: url('{{ asset('/img/web-bg/eventcatalog-bg.png') }}');">
    <div class="membership-section">
          <div class="membership-content">
              Events
              <div class="underline"></div>
          </div>
      </div>
    </section>

    <!-- Topics -->
    <section class="services-cards">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="search-bar d-flex align-items-center">
                    <input type="text" class="form-control" placeholder="Search Event">
                    <select class="form-select me-2" style="max-width: 120px;">
                        <option>Sort by Date</option>
                    </select>
                    <select class="form-select me-2" style="max-width: 120px;">
                        <option>All Types</option>
                    </select>
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
        </div>
</section>


    <section id="programs" class="programs-section container-fluid">
        <div class="container">
            <div class="row align-items-center justify-content-between mb-3 header">
                <div class="col-auto">
                    <h4 class="fw-bold text-brown">Programs</h4>
                </div>
                <div class="col-auto">
                    <a href="#" class="text-muted small view-all">View All</a>
                </div>
            </div>
        </div>

    
        <div class="container program-container mt-4">
            <div class="row">
                <div class="col-md-3 ">
                    <div class="sidebar">
                        <button class="category active sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/adal.png') }}" alt="Adal Kordilyera" class="category-img">
                            Adal Kordilyera
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/kordiarts.png') }}" alt="KordiArts" class="category-img">
                            KordiArts
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/siribs.png') }}" alt="SIRIB Leaders" class="category-img">
                            SIRIB Leaders
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/hope.png') }}" alt="Project H.O.P.E" class="category-img">
                            Project H.O.P.E
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/dalluyon.png') }}" alt="Project Dalluyon" class="category-img">
                            Project Dalluyon
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/10kok.png') }}" class="category-img">
                            10KOK
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/pansigedan.png') }}" alt="Pansigedan" class="category-img">
                            Pansigedan
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/sumya.png') }}" alt="SUMYA" class="category-img">
                            SUMYA
                        </button>
                        <button class="category btn-outline-success sort-btn" onclick="window.location.href='#';">
                            <img src="{{ asset('img/programs/bannuar.png') }}" class="category-img">
                            Bannuar
                        </button>
                    </div>
                </div>

            
        
            <div class="col-md-9">
                <div class="container ">
                    <!-- Org Info Section -->
                    <div class="row mb-4 align-items-center justify-content-center info-content ">
                        <div class="col-md-10 ">
                            <div class="d-flex align-items-center">
                                <!-- Logo -->
                                <img src="{{ asset('img/adal.png') }}" alt="Adal Kordilyera Logo" class="me-3" style="width: 80px; height: auto;">
                                
                                <!-- Text -->
                                <p class="mb-0">Adal Kordilyera is a digital information-sharing platform that provides 
                                    <span class="fw-bold">skills development webinars</span> based on market demand and relevance.</p>
                            </div>
                        </div>
                    </div>

                <!-- event catalogs  -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="program-card">
                            <a href="{{ route('pages') }}">
                                <img src="{{ asset('img/event_pages/poster2.png') }}" alt="Event Image" class="img-fluid mb-2">
                            </a>
                            <a href="{{ route('pages') }}" style="text-decoration: none !important; color: inherit !important;">
                                <span style="color: #a0522d;"><h5>EPISODE 47: Mental Health in the Workplace</h5></span>
                            </a>
                            <div class="event-details">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <span>Sunday, 2 Feb 2025</span>
                                        <i class="bi bi-geo-alt me-2"></i>
                                        <span>Online via Zoom</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-clock me-2"></i>
                                        <span>4:00 PM – 6:00 PM</span>
                                    </div>
                                    <a href="#" class="see-details">See Details <span class="arrow">→</span></a>
                                    <button class="btn btn-register" onclick="window.location.href='{{ route('eventregispage') }}'">REGISTER</button>
                                    <button class="btn btn-rate" onclick="window.location.href='your-link-here.html'">RATE</button>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="program-card">
                            <a href="{{ route('pages') }}">
                                <img src="{{ asset('img/event_pages/poster1.png') }}" alt="Event Image" class="img-fluid mb-2">
                            </a>
                            <a href="{{ route('pages') }}" style="text-decoration: none !important; color: inherit !important;">
                                <span style="color: #a0522d;"><h5>EPISODE 46: Labor Laws on Employment Contract and...</h5></span>
                            </a>
                                <div class="event-details">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-event me-2"></i>
                                        <span>Sunday, 2 Feb 2025</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-geo-alt me-2"></i>
                                        <span>Online via Zoom</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-clock me-2"></i>
                                        <span>4:00 PM – 6:00 PM</span>
                                    </div>
                                    <a href="#" class="see-details">See Details <span class="arrow">→</span></a>
                                    <button class="btn btn-register" onclick="window.location.href='{{ route('eventregispage') }}'">REGISTER</button>
                                    <button class="btn btn-rate" onclick="window.location.href='your-link-here.html'">RATE</button>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="program-card">
                            <a href="{{ route('pages') }}">
                                <img src="{{ asset('img/event_pages/poster3.png') }}" alt="Event Image" class="img-fluid mb-2">
                            </a>
                            <a href="{{ route('pages') }}" style="text-decoration: none !important; color: inherit !important;">
                                <span style="color: #a0522d;"><h5>EPISODE 45: Forensic Accounting</h5></span>
                            </a>
                            <div class="event-details">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <span>Sunday, 2 Feb 2025</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    <span>Online via Zoom</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-clock me-2"></i>
                                    <span>4:00 PM – 6:00 PM</span>
                                </div>
                                <a href="#" class="see-details">See Details <span class="arrow">→</span></a>
                                <button class="btn btn-register" onclick="window.location.href='{{ route('eventregispage') }}'">REGISTER</button>
                                <button class="btn btn-rate" onclick="window.location.href='your-link-here.html'">RATE</button>
                            </div>
                        </div>
                    </div>

                   
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
       
    </div>

</section>
@endsection


