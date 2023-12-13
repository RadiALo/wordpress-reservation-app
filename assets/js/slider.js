const slider = document.querySelector('.slider__slide-container');
let currentIndex = 0;

setInterval(function () {
  currentIndex = (currentIndex + 1) % slider.children.length;
  updateSlider();
}, 5000);

function updateSlider() {
  const translateValue = -currentIndex * 100;
  slider.style.transform = `translateX(${translateValue}%)`;
}