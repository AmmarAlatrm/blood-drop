// script.js
document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll(".nav-link");
    const currentPath = window.location.pathname;

    links.forEach(link => {
        if(link.getAttribute("href") === currentPath.split("/").pop()) {
            link.classList.add("active");
        }
    });
});
