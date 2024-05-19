  // JavaScript for slideshow
let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("slides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].classList.remove("active");
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    slides[slideIndex-1].classList.add("active");
    setTimeout(showSlides, 3000); // Change image every 3 seconds
};

document.addEventListener("DOMContentLoaded", function() {
    const menuIcon = document.querySelector(".menu-icon");
    const toolbar = document.querySelector(".toolbar");

    menuIcon.addEventListener("click", function() {
        toolbar.classList.toggle("active");
    });
});