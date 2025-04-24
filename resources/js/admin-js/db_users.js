const usersBtn = document.getElementById("usersBtn");
const pendingBtn = document.getElementById("pendingBtn");

usersBtn.addEventListener("click", () => {
    usersBtn.classList.add("active");
    pendingBtn.classList.remove("active");
    // Optional: logic to show "Users" content and hide "Pending"
});

pendingBtn.addEventListener("click", () => {
    pendingBtn.classList.add("active");
    usersBtn.classList.remove("active");
    // Optional: logic to show "Pending" content and hide "Users"
});