<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('img/logos/cylcentral-logo1.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CYLCentral</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/css/admin-css/db_overview.css')
    @vite('resources/css/partials-css/admin_sidebar.css')
    @vite('resources/css/admin-css/db_users.css')
    @vite('resources/css/admin-css/db_programs.css')


    <!-- Bootstrap and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --sidebar-width: 260px;
        }
        
        html, body {
            height: 100%;
            overflow-x: hidden;
        }
        
        /* Fixed Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            z-index: 50;
            transition: transform 0.3s ease;
            background-color: white;
            box-shadow: none !important;
        }
        
        /* Main Content Area */
        .main-content-container {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            position: relative;
            transition: margin-left 0.3s ease;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            
            .admin-sidebar.active {
                transform: translateX(0);
            }
            
            .main-content-container {
                margin-left: 0;
                width: 100%;
            }
            
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.5);
                z-index: 40;
            }
            
            .admin-sidebar.active + .sidebar-overlay {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Mobile Sidebar Toggle Button -->
    <button class="md:hidden fixed top-4 left-4 z-50 p-2 rounded-md bg-gray-800 text-white" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>
    
    <!-- Sidebar Overlay (Mobile Only) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Fixed Sidebar -->
    <aside class="admin-sidebar">
        @include('partials.admin_sidebar')
    </aside>

    <!-- Main Content Area -->
    <div class="main-content-container">
        <!-- Content that will change between pages -->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.admin-sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            // Toggle sidebar visibility
            function toggleSidebar() {
                sidebar.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
            }
            
            // Event listeners
            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);
            
            // Close sidebar when a nav link is clicked (mobile)
            document.querySelectorAll('.admin-sidebar .nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        toggleSidebar();
                    }
                });
            });
            
            // Close sidebar when clicking outside (mobile)
            document.addEventListener('click', (event) => {
                if (window.innerWidth <= 768 && 
                    !sidebar.contains(event.target) && 
                    event.target !== sidebarToggle &&
                    sidebar.classList.contains('active')) {
                    toggleSidebar();
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page-specific scripts -->
    @vite('resources/js/app.js')
    @vite('resources/js/charts/totalevents.js')
    @vite('resources/js/charts/partnergroups.js')
    @vite('resources/js/charts/regularmember.js')
    @vite('resources/js/main-js/eventpages.js')
    @vite('resources/js/admin-js/db_users.js')
    
    <!-- Fix for admin dropdown -->    
    <script src="{{ asset('js/admin-dropdown-fix.js') }}"></script>

</body>
</html>