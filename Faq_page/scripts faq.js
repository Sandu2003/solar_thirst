document.querySelectorAll('.faq-item').forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle('active');
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