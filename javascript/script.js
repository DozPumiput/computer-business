const slides = document.querySelectorAll('.slides img');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let activeSlide = 0;
let intervalId;

function showSlide(slideIndex) {
  slides.forEach(slide => slide.style.display = 'none');
  slides[slideIndex].style.display = 'block';
}

showSlide(activeSlide);

// Start autoplay
intervalId = setInterval(() => {
  activeSlide = (activeSlide + 1) % slides.length;
  showSlide(activeSlide);
}, 5000); // Change this value to adjust slide interval in milliseconds

prevBtn.addEventListener('click', () => {
  clearInterval(intervalId); // Stop autoplay on manual navigation
  activeSlide = (activeSlide - 1 + slides.length) % slides.length;
  showSlide(activeSlide);
  // Restart autoplay after 2 seconds (optional)
  setTimeout(() => {
    intervalId = setInterval(() => {
      activeSlide = (activeSlide + 1) % slides.length;
      showSlide(activeSlide);
    }, 3000);
  }, 2000);
});

nextBtn.addEventListener('click', () => {
  clearInterval(intervalId); // Stop autoplay on manual navigation
  activeSlide = (activeSlide + 1) % slides.length;
  showSlide(activeSlide);
  // Restart autoplay after 2 seconds (optional)
  setTimeout(() => {
    intervalId = setInterval(() => {
      activeSlide = (activeSlide + 1) % slides.length;
      showSlide(activeSlide);
    }, 3000);
  }, 2000);
});
