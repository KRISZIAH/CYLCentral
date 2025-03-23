function toggleDropdownContent(id) {
    let element = document.getElementById(id);
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}



// scrolling reviews
const container = document.getElementById("reviews");
const scrollAmount = 320; // Adjust based on card width

function scrollLeft() {
    container.scrollBy({ left: -scrollAmount, behavior: "smooth" });
}

function scrollRight() {
    container.scrollBy({ left: scrollAmount, behavior: "smooth" });
}