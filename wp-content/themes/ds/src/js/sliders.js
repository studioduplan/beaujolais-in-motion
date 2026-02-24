import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

document.addEventListener("DOMContentLoaded", (event) => {

    gsap.registerPlugin(ScrollTrigger);

    const container = document.querySelector(".sliders__items");
    const slides = gsap.utils.toArray(".slide");
    let mobile = gsap.matchMedia();

    if(container) {
        mobile.add("(min-width: 768px)", () => {
            gsap.to(slides, {
                xPercent: -100 * (slides.length),
                ease: "none",
                scrollTrigger: {
                    trigger: container,
                    pin: true,
                    pinSpacing: true,
                    scrub: true,
                    start: () => "top 100px",
                    end: () => "+=" + (container.scrollWidth - window.innerWidth)
                }
            });     
        });   
    }
});