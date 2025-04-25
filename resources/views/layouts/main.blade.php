

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CYLCentral</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/css/main-css/home.css')
    @vite('resources/css/main-css/aboutpage.css')
    @vite('resources/css/main-css/membershippage.css')
    @vite('resources/css/main-css/membership_registration.css')
    @vite('resources/css/main-css/editprofile.css')
    @vite('resources/css/main-css/eventcatalog.css')
    @vite('resources/css/main-css/files.css')
    @vite('resources/css/main-css/eventpages.css')
    @vite('resources/css/partials-css/navbar.css')
    @vite('resources/css/partials-css/footer.css')

    <!-- Styles for Users(Login) -->
    @vite('resources/css/users-css/announcement.css')

    <!-- Styles for login/registration -->
    @vite('resources/css/auth-css/register.css')
    @vite('resources/css/auth-css/login.css')

    <!-- Styles for admin -->
    @vite('resources/css/admin/dashboard_analytics.css')


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
    @vite('resources/js/main-js/home.js')
    @vite('resources/js/main-js/editprofile.js')
    @vite('resources/js/main-js/eventcatalog.js')
    @vite('resources/js/main-js/eventpages.js')
    @vite('resources/js/partials-js/navbar.js')
    @vite('resources/js/partials-js/footer.js')

    <!-- Scripts for Users(Login) -->
    @vite('resources/js/user-js/announcement.js')

    <!-- Scripts for Dashboard -->
    @vite('resources/js/charts/totalevents.js')
    @vite('resources/js/charts/partnergroups.js')
    @vite('resources/js/charts/regularmember.js')
    
    

</body>
</html>