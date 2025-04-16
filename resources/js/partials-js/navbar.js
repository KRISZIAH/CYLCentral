
document.addEventListener('DOMContentLoaded', function() {
    // Navbar Glassmorphism sana to
    const navbar = document.querySelector('.navbar');


    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });


    // Active Link Tracking
    function setActiveNavLink() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');


        // Main pages active styling
        const mainPages = [
            '/',
            '/home',
            // '/about',
            '/events',
            '/membership',
            // '/contact'
        ];


        navLinks.forEach(link => {
            link.classList.remove('active');


            const linkPath = new URL(link.href).pathname;


            if (mainPages.includes(linkPath) && linkPath === currentPath) {
                link.classList.add('active');
            }
        });
    }


    setActiveNavLink();


    // Mobile Menu Toggle
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');


    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function() {
            navbarCollapse.classList.toggle('show');
            this.setAttribute('aria-expanded',
                this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'
            );
        });
    }


    const mobileNavLinks = document.querySelectorAll('.navbar-collapse .nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 768) {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                const navbarToggler = document.querySelector('.navbar-toggler');


                navbarCollapse.classList.remove('show');
                navbarToggler.setAttribute('aria-expanded', 'false');
            }
        });
    });


    // Dropdown functionality for authenticated users
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function(e) {
            const dropdownMenu = this.nextElementSibling;
            dropdownMenu.classList.toggle('show');
        });


        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            dropdowns.forEach(dropdown => {
                if (dropdown.classList.contains('show') &&
                    !dropdown.previousElementSibling.contains(e.target)) {
                    dropdown.classList.remove('show');
                }
            });
        });
    }
});
