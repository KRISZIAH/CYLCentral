document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.getElementById('adminProfileDropdown');
    const dropdownArrow = document.querySelector('.dropdown-arrow');

    if (dropdownToggle && dropdownArrow) {
        dropdownToggle.addEventListener('click', function() {
            // Toggle the arrow direction
            if (dropdownArrow.classList.contains('arrow-up')) {
                dropdownArrow.classList.remove('arrow-up');
                dropdownArrow.innerHTML = '<polyline points="6 9 12 15 18 9"></polyline>';
            } else {
                dropdownArrow.classList.add('arrow-up');
                dropdownArrow.innerHTML = '<polyline points="6 15 12 9 18 15"></polyline>';
            }
        });

        // Reset arrow when clicking outside
        document.addEventListener('click', function(event) {
            if (!dropdownToggle.contains(event.target) && !event.target.closest('.dropdown-menu')) {
                dropdownArrow.classList.remove('arrow-up');
                dropdownArrow.innerHTML = '<polyline points="6 9 12 15 18 9"></polyline>';
            }
        });
    }
});
