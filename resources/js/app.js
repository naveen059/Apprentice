import './bootstrap';


document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll('.testimonial-slide');

    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    // Show the first slide initially
    showSlide(currentIndex);

    // Automatic slide transition
    setInterval(nextSlide, 5000); // Adjust interval as needed
});
