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

