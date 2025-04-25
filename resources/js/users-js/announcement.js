document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".announcement-card").forEach(card => {
        card.addEventListener("click", function () {
            document.getElementById("announcementModalLabel").innerText = this.getAttribute("data-title");
            document.getElementById("announcementMessage").innerText = this.getAttribute("data-message");
        });
    });
});
