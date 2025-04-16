document.addEventListener("DOMContentLoaded", function() {
    // Active Link Highlight
    function setActiveNavLink() {
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.getAttribute("href") === currentPath) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    }
    setActiveNavLink();

    // Close Dropdown when clicking outside
    document.addEventListener("click", function(event) {
        const dropdowns = document.querySelectorAll(".dropdown-menu");
        dropdowns.forEach(dropdown => {
            if (!dropdown.parentElement.contains(event.target)) {
                dropdown.classList.remove("show");
            }
        });
    });
});
