document.addEventListener('DOMContentLoaded', function() {
    // Initialize all dropdowns
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl);
    });

    // Add click event to admin dropdown
    const adminDropdown = document.getElementById('adminDropdown');
    if (adminDropdown) {
        adminDropdown.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = bootstrap.Dropdown.getInstance(adminDropdown);
            if (dropdown) {
                dropdown.toggle();
            } else {
                new bootstrap.Dropdown(adminDropdown).toggle();
            }
        });
    }
});
