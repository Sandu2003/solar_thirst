document.getElementById('calculateBtn').addEventListener('click', function() {
    const unitsInput = document.getElementById('unitsInput').value;
    const resultElement = document.getElementById('result');

    if (unitsInput && unitsInput > 0) {
        const kW = unitsInput / 110; 
        resultElement.textContent = `kW: ${kW.toFixed(2)}`;
    } else {
        resultElement.textContent = 'Please enter a valid unit value.';
    }
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