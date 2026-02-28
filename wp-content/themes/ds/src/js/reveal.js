import gsap from "gsap";
import SplitText from "gsap/SplitText";
import ScrollTrigger from "gsap/ScrollTrigger";

document.addEventListener("DOMContentLoaded", (event) => {
  document.fonts.ready.then(function () {
    gsap.registerPlugin(SplitText, ScrollTrigger);

    const revealText = document.querySelectorAll(".anim-title");

    if (revealText) {
      revealText.forEach((reveal) => {
        // Reset if needed
        if (reveal.anim) {
          reveal.anim.progress(1).kill();
          reveal.split.revert();
        }

        reveal.split = new SplitText(reveal, {
          type: "lines,words,chars",
          linesClass: "split-line",
        });

        // Set up the anim
        reveal.anim = gsap.from(reveal.split.chars, {
          scrollTrigger: {
            trigger: reveal,
            // fire the animation only once
            toggleActions: "play none none none",
            start: "top 80%",
            once: true,
          },
          duration: 0.5,
          ease: "circ.out",
          y: 100,
          stagger: 0.01,
        });
        gsap.set(reveal, { opacity: 1 });
      });
    }
  });
});
