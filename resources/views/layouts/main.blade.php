

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CYLCentral</title>


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/css/home.css')
    @vite('resources/css/membershippage.css')
    @vite('resources/css/editprofile.css')
    @vite('resources/css/eventcatalog.css')
    @vite('resources/css/files.css')
    @vite('resources/css/eventpages.css')
    @vite('resources/css/dashboard_analytics.css')



    <!-- Bootstrap and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>


<body>
    <!-- Navbar -->
    <header>
        @include('partials.navbar')
    </header>


    <!-- Main Content -->
    <main>
        @yield('content')

    </main>


    <!-- Footer -->
    <footer>
        @include('partials.footer')
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Page-specific scripts -->
    @vite('resources/js/app.js')
    @vite('resources/js/editprofile.js')
    @vite('resources/js/eventcatalog.js')
    @vite('resources/js/charts/totalevents.js')
    @vite('resources/js/charts/partnergroups.js')
    @vite('resources/js/charts/regularmember.js')
    @vite('resources/js/eventpages.js')
</body>
</html>