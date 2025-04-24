<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('img/logos/cylcentral-logo1.png') }}">
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
    @vite('resources/css/main-css/editprofile.css')
    @vite('resources/css/main-css/eventcatalog.css')
    @vite('resources/css/main-css/files.css')
    @vite('resources/css/main-css/eventpages.css')
    @vite('resources/css/partials-css/navbar.css')
    @vite('resources/css/partials-css/navbar.css')
    @vite('resources/css/partials-css/footer.css')

    <!-- Styles for login/registration -->
    @vite('resources/css/auth-css/register.css')
    @vite('resources/css/auth-css/login.css')

    <!-- Styles for admin -->
    @vite('resources/css/admin-css/db_overview.css')
    @vite('resources/css/partials-css/admin_sidebar.css')
    @vite('resources/css/admin-css/db_users.css')

    <!-- Bootstrap and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="bg-gray-50">
    @include('components.toast')
    <!-- Navbar -->
    <header>
        @include('partials.navbar')
    </header>

    <!-- Main Content -->
    <main>
        <div id="pjax-content">
            {{-- To use the main content navbar widget, add this to your page: --}}
    {{-- @include('partials.navbar-main') --}}
    @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        @include('partials.footer')
    </footer>

    <!-- Toast CSS/JS -->
    <link rel="stylesheet" href="/css/components/toast.css">
    <script src="/js/components/toast.js"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- React SPA entry -->


    <!-- Bootstrap JS (Include before closing </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>