import { gsap } from "gsap";

document.addEventListener("DOMContentLoaded", () => {
  // Sticky .site-header with GSAP up/down animation
  const header = document.querySelector(".site-header");
  if (!header) return;

  // Ensure header starts with transform 0
  gsap.set(header, { y: 0 });

  let lastScroll = window.pageYOffset || document.documentElement.scrollTop;
  let ticking = false;
  const startStickyAt = header.offsetHeight || 64;

  function onScroll() {
    const current = window.pageYOffset || document.documentElement.scrollTop;

    // If at top, fully show and remove sticky
    if (current <= 0) {
      header.classList.remove("is-sticky", "is-hidden");
      gsap.to(header, { y: 0, duration: 0.25, ease: "power2.out" });
      lastScroll = current;
      return;
    }

    // Add sticky class when past threshold
    if (current > startStickyAt) header.classList.add("is-sticky");
    else header.classList.remove("is-sticky");

    if (current > lastScroll && current > startStickyAt) {
      // scrolling down -> hide header
      if (!header.classList.contains("is-hidden")) {
        header.classList.add("is-hidden");
        gsap.to(header, { y: "-100%", duration: 0.3, ease: "power2.out" });
      }
    } else {
      // scrolling up -> show header
      if (header.classList.contains("is-hidden") || current < startStickyAt) {
        header.classList.remove("is-hidden");
        gsap.to(header, { y: 0, duration: 0.3, ease: "power2.out" });
      }
    }

    lastScroll = current <= 0 ? 0 : current;
  }

  window.addEventListener(
    "scroll",
    () => {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          onScroll();
          ticking = false;
        });
        ticking = true;
      }
    },
    { passive: true },
  );
});
