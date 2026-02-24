document.addEventListener("DOMContentLoaded", (event) => {
    
    if(window.matchMedia("(max-width: 768px)").matches) {
        const toggleMenu = document.querySelector('.site-header__mobile-menu-burger');

        toggleMenu.addEventListener('click', function() {
            document.body.classList.toggle("open-menu");
            toggleMenu.parentElement.classList.toggle("menu-active");
        });   
    }
});