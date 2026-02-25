import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
  const hero = document.querySelector(".template-pages__hero");
  if (!hero) return;

  // Ensure hero has positioning for absolute background
  const computed = getComputedStyle(hero);
  if (computed.position === "static") {
    hero.style.position = "relative";
  }

  let bg = hero.querySelector(".template-pages__hero-bg");
  if (!bg) {
    bg = document.createElement("div");
    bg.className = "template-pages__hero-bg";
    Object.assign(bg.style, {
      position: "absolute",
      inset: "0",
      zIndex: "-1",
      pointerEvents: "none",
      backgroundSize: "cover",
      backgroundPosition: "center center",
      willChange: "transform, opacity",
      transformOrigin: "50% 50%",
    });
    // try set background from data attribute if present
    const src = hero.dataset.bg;
    if (src) bg.style.backgroundImage = `url('${src}')`;
    hero.prepend(bg);
  }

  // Smooth scale loop for the background (created paused — will start after arrival)
  const bgLoop = gsap.to(bg, {
    duration: 14,
    scale: 1,
    ease: "sine.inOut",
    repeat: -1,
    yoyo: true,
    paused: true,
  });

  // Fade-in logo and intro with a timeline; use ScrollTrigger if hero is below fold
  const logo = hero.querySelector(".template-pages__hero-logo");
  const intro = hero.querySelector(".template-pages__hero-intro");

  const introItems = intro ? Array.from(intro.children) : [];

  const tl = gsap.timeline({ paused: true });

  if (logo) {
    tl.from(logo, {
      autoAlpha: 0,
      y: 18,
      duration: 0.8,
      ease: "power2.out",
    });
  }

  if (introItems.length) {
    tl.from(
      introItems,
      {
        autoAlpha: 0,
        y: 24,
        duration: 0.8,
        ease: "power2.out",
        stagger: 0.12,
      },
      "-=.45",
    );
  } else if (intro) {
    tl.from(
      intro,
      {
        autoAlpha: 0,
        y: 22,
        duration: 0.8,
        ease: "power2.out",
      },
      "-=.45",
    );
  }

  // Play timeline when hero enters viewport, or immediately if visible
  // On enter: play arrival scale (big -> back to normal) then play timelines + bg loop
  const playHero = () => {
    // if bg already scaled by mouse, reset briefly
    gsap.killTweensOf(bg);
    gsap.fromTo(
      bg,
      { scale: 1.35 },
      {
        scale: 1,
        duration: 1,
        ease: "power3.out",
        onComplete: () => {
          if (tl) tl.play();
          if (bgLoop) bgLoop.play();
        },
      },
    );
  };

  if (ScrollTrigger) {
    ScrollTrigger.create({
      trigger: hero,
      start: "top 80%",
      onEnter: playHero,
    });
    // If hero already in view, play immediately
    const rect = hero.getBoundingClientRect();
    if (rect.top < window.innerHeight) playHero();
  } else {
    playHero();
  }
});
