document.addEventListener("DOMContentLoaded", function () {
    // Get file name from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const fileName = urlParams.get("file");

    if (fileName) {
        document.getElementById("fileViewer").src = fileName;
    } else {
        document.getElementById("fileViewer").innerHTML = "<p>No file selected.</p>";
    }
});
