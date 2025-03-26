

document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-btn");
    const saveBtn = document.getElementById("saveBtn");
    const cancelBtn = document.getElementById("cancelBtn");
    const inputs = document.querySelectorAll("#profileForm input");
    const profilePic = document.getElementById("profile-pic");
    const profileUpload = document.getElementById("profile-upload");


    let originalValues = {}; // Store original values for cancel


    // Store initial values
    inputs.forEach(input => originalValues[input.id] = input.value);


    // Enable only the clicked field when clicking its ✏️ button
    editButtons.forEach(button => {
        button.addEventListener("click", function () {
            let inputField = this.previousElementSibling;
            inputField.disabled = false;
            inputField.focus();


            // Show Save & Cancel buttons
            saveBtn.classList.remove("d-none");
            cancelBtn.classList.remove("d-none");
        });
    });


    // Cancel edits (restore original values)
    cancelBtn.addEventListener("click", function () {
        inputs.forEach(input => {
            input.value = originalValues[input.id];
            input.disabled = true;
        });


        updateDisplayedName(); // Restore original name


        // Hide Save & Cancel buttons
        saveBtn.classList.add("d-none");
        cancelBtn.classList.add("d-none");
    });


    // Save changes
    document.getElementById("profileForm").addEventListener("submit", function (event) {
        event.preventDefault();
        alert("Profile updated successfully!");


        inputs.forEach(input => {
            input.disabled = true;
            originalValues[input.id] = input.value; // Update stored values
        });


        updateDisplayedName(); // Update the displayed name


        // Hide Save & Cancel buttons
        saveBtn.classList.add("d-none");
        cancelBtn.classList.add("d-none");
    });


    // Change profile picture instantly
    profileUpload.addEventListener('change', function(event) {
        const file = event.target.files[0];


        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePic.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });


    // Function to update the displayed name dynamically
    function updateDisplayedName() {
        const firstName = document.getElementById("firstName").value;
        const lastName = document.getElementById("lastName").value;
        document.querySelector(".profile-header h4").textContent = firstName + " " + lastName;
    }
});
