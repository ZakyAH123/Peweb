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
      const menuToggle = document.getElementById('menu-toggle');
      const sidebar = document.getElementById('sidebar');
  
      menuToggle.addEventListener('click', function() {
          sidebar.classList.toggle('active');
      });
  });
  

