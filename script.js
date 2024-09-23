// Smooth scrolling for navigation
document.querySelectorAll('.smooth-scroll').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Fade-in effect when scrolling
const fadeInElements = document.querySelectorAll('.fade-in');

const fadeInObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, {
    threshold: 0.1
});

fadeInElements.forEach(element => {
    fadeInObserver.observe(element);
});

// Contact form validation
document.getElementById('contact-form').addEventListener('submit', function (event) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
    const status = document.getElementById('form-status');

    if (name === '' || email === '' || message === '') {
        event.preventDefault();
        status.textContent = 'Wszystkie pola są wymagane.';
        status.style.color = 'red';
    }
});
