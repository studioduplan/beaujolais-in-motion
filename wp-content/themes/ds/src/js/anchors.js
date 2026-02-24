document.addEventListener("DOMContentLoaded", (event) => {

    const html = document.querySelector("html");
    if(window.location.hash != "") {
        html.style.scrollBehavior = "auto";
    } else {
        html.style.scrollBehavior = "smooth";
    }

    document.querySelectorAll('a[href^="#"]').forEach(trigger => {
        trigger.onclick = function(e) {
            e.preventDefault();
            window.scrollTo({
                top: document.querySelector(this.getAttribute('href')).offsetTop,
                behavior: "smooth"
            });
        };
    });
});