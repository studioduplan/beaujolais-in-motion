import gsap from "gsap";
import SplitText from "gsap/SplitText";
import ScrollTrigger from "gsap/ScrollTrigger";

document.addEventListener("DOMContentLoaded", (event) => {

    document.fonts.ready.then(function () {
        gsap.registerPlugin(SplitText, ScrollTrigger);

        const revealText = document.querySelectorAll(".reveal-text");
        
        if(revealText) {
            revealText.forEach((reveal) => {
                // Reset if needed
                if (reveal.anim) {
                    reveal.anim.progress(1).kill();
                    reveal.split.revert();
                }

                reveal.split = new SplitText(reveal, {
                    type: "lines,words,chars",
                    linesClass: "split-line"
                });

                // Set up the anim
                reveal.anim = gsap.from(reveal.split.chars, {
                    scrollTrigger: {
                        trigger: reveal,
                        toggleActions: "restart pause resume reverse",
                        start: "top 50%"
                    },
                    duration: 0.6,
                    ease: "circ.out",
                    y: 80,
                    stagger: 0.02
                });
                gsap.set(reveal, {opacity: 1});
            });
        }
    });
});