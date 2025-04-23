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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Bootstrap CSS (Include in <head>) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Styles for login/registration -->
    @vite('resources/css/auth-css/register.css')
    @vite('resources/css/auth-css/login.css')

    <!-- Styles for admin -->
    @vite('resources/css/admin-css/dashboard_analytics.css')

    <!-- Bootstrap and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>
    <!-- No Navbar -->
   
    <!-- Main Content -->
    <main>
        @yield('content')

    </main>

    <!-- No Footer -->
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page-specific scripts -->
    @vite('resources/js/app.js')
    @vite('resources/js/main-js/editprofile.js')
    @vite('resources/js/charts/totalevents.js')
    @vite('resources/js/charts/partnergroups.js')
    @vite('resources/js/charts/regularmember.js')
    @vite('resources/js/main-js/eventpages.js')
    @vite('resources/js/partials-js/navbar.js')
    @vite('resources/js/partials-js/footer.js')

    <!-- Bootstrap JS (Include before closing </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>