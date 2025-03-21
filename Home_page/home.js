let lastScrollPosition = 0;
const navBar = document.querySelector('nav');


const halfwayPoint = document.documentElement.scrollHeight / 2;

window.addEventListener('scroll', () => {
    const currentScrollPosition = window.scrollY;

    if (currentScrollPosition > halfwayPoint && currentScrollPosition > lastScrollPosition) {
        
        navBar.classList.add('nav-hidden');
    } else if (currentScrollPosition < lastScrollPosition) {
        
        navBar.classList.remove('nav-hidden');
    }

    lastScrollPosition = currentScrollPosition;
});

//contact form js
document.addEventListener("DOMContentLoaded", function() {
    emailjs.init("3xQN3y69PmBcL-LDZ");  // EmailJS Public Key

    const contactForm = document.querySelector("#contact");

    contactForm.addEventListener("submit", function(event) {
        event.preventDefault();

        // Collect form data using querySelector for each field
        const name = document.querySelector("input[name='name']").value;
        const email = document.querySelector("input[name='email']").value;
        const message = document.querySelector("textarea[name='message']").value;

        // Set parameters for EmailJS
        const templateParams = {
            from_name: name,
            from_email: email,
            message: message
        };

        // Send email using EmailJS
        emailjs.send("service_phhd6pg", "template_8f6tq6k", templateParams)
            .then(function(response) {
                console.log("Success!", response.status, response.text);
                alert("Message sent successfully!");
                contactForm.reset();  // Clear the form
            }, function(error) {
                console.error("Failed...", error);
                alert("Failed to send the message. Please try again later.");
            });
    });
});

let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.nav-menu');
let navLinks = document.querySelectorAll('.nav-menu a ');


window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
          
            document.querySelector(`header nav a[href*='${id}']`).classList.add('active');
        }
    });
};


menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x'); 
    navbar.classList.toggle('active');
};