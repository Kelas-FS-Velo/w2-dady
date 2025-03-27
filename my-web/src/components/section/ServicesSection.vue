<template>
  <div
    id="services"
    class="horizontal flex overflow-x-hidden min-h-screen bg-black text-white"
  >
    <!-- Hero Section -->
    <section
      id="hero"
      class="content container relative mx-auto px-4 py-20 md:py-32 min-h-screen min-w-screen w-full flex flex-col justify-center items-center"
    >
      <div class="container mx-auto">
        <div
          id="heroServices"
          class="mx-auto flex items-center border border-gray-700 rounded-[10px]"
        >
          <p
            id="heroServicesDesc"
            class="w-6/12 text-3xl text-white border-r border-gray-700 p-10 text-left leading-[150%] tracking-wide"
          >
            We specialize in transforming ideas into impactful digital
            experiences. By leveraging cutting-edge technologies and creative
            strategies, we help brands and individuals thrive in a competitive
            landscape. Discover our projects and let's build something
            extraordinary together.
          </p>
          <p
            id="heroServicesTitle"
            class="text-6xl w-6/12 capitalize border border-gray-700 text-left leading-[120%] p-10 font-semibold mb-6 bg-gradient-to-r from-blue-400 to-purple-600 bg-clip-text text-transparent"
          >
            empowering your vision, crafting your success
          </p>
        </div>
        <p
          id="heroServicesScroll"
          class="flex relative top-40 justify-center w-full text-xl capitalize font-thin italic text-gray-400"
        >
          keep scrolling
        </p>
      </div>
    </section>

    <!-- Portfolio Section with Large Cards -->
    <section
      id="projects"
      v-for="(project, index) in data"
      :key="index"
      ref="projectCards"
      class="content container mx-auto px-4 py-16 min-w-screen min-h-screen flex items-center project-section"
    >
      <div class="container mx-auto">
        <div
          class="bg-gray-900/60 border border-gray-700 rounded-xl overflow-hidden project-card"
        >
          <div id="projectCard" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Project Image -->
            <div
              id="imgCard"
              class="relative h-[300px] lg:h-[500px] overflow-hidden project-image"
            >
              <img
                v-if="project.img"
                :src="project.img"
                :alt="project.title || 'Project Image'"
                class="w-full h-full object-cover"
              />

              <div
                v-else
                class="flex items-center justify-center w-full h-full bg-gray-800 text-white"
              >
                No Image Available
              </div>
            </div>

            <!-- Project Details -->
            <div
              id="detailsCard"
              class="p-8 flex flex-col justify-center project-details"
            >
              <h2 class="text-3xl md:text-4xl font-bold mb-4 project-title">
                {{ project.title }}
              </h2>
              <p class="text-gray-300 text-lg mb-6 project-desc">
                {{ project.desc }}
              </p>
              <div class="mb-8 framework project-tech">
                <h3 class="text-xl font-semibold mb-3">Technologies Used:</h3>
                <div class="flex flex-wrap gap-3">
                  <span
                    v-if="project.framework"
                    class="px-4 py-2 bg-gray-800 rounded-full text-sm font-medium"
                  >
                    {{ project.framework }}
                  </span>
                </div>
              </div>
              <button
                class="w-fit px-4 py-2 border cursor-pointer border-white/20 rounded-md hover:bg-white/10 flex items-center group project-button"
              >
                View Project Details
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M14 5l7 7m0 0l-7 7m7-7H3"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section
      id="cta"
      class="content bg-black min-w-screen min-h-screen px-4 py-20"
    >
      <div class="mx-auto container">
        <div
          id="ctaContent"
          class="bg-gradient-to-r from-blue-900/50 to-purple-900/50 p-12 rounded-2xl text-center border-2 border-gray-700"
        >
          <h2 class="text-3xl md:text-4xl font-bold mb-6 cta-title">
            Ready to start your project?
          </h2>
          <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto cta-desc">
            Let's create something amazing together. Contact us today to discuss
            your ideas.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button
              class="px-6 py-3 rounded-md bg-white text-black hover:bg-gray-200 font-medium cta-button"
            >
              Get a Free Quote
            </button>
            <button
              class="px-6 py-3 rounded-md border border-white text-white hover:bg-white/10 font-medium cta-button"
            >
              View Our Process
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from "vue";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import data from "./index";

if (typeof window !== "undefined") {
  gsap.registerPlugin(ScrollTrigger);
}

// refs
const projectCards = ref([]);
const widthMobile = ref(typeof window !== "undefined" ? window.innerWidth : 0);

// handling resize
const handleResize = () => {
  widthMobile.value = window.innerWidth;
  ScrollTrigger.getAll().forEach((trigger) => trigger.kill());
  if (widthMobile.value > 500) {
    nextTick(() => {
      animateProjects();
      enhanceProjectAnimations();
    });
  } else {
    nextTick(() => {
      animateProjectsMobile();
      enhanceProjectAnimations();
    });
  }
};

// animated desktop
const animateProjects = () => {
  gsap.to(".horizontal .content", {
    x: () => -(projectCards.value.length + 1) * window.innerWidth,
    ease: "none",
    scrollTrigger: {
      trigger: ".horizontal",
      pin: true,
      scrub: 1,
      end: () =>
        "+=" + (document.querySelector(".horizontal")?.offsetWidth || 0),
    },
  });
};

// animated mobile
const animateProjectsMobile = () => {
  projectCards.value.forEach((card) => {
    gsap.fromTo(
      card,
      { opacity: 0, y: 50 },
      {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "power2.out",
        scrollTrigger: {
          trigger: card,
          start: "top 90%",
          toggleActions: "play none none none",
        },
      }
    );
  });
};

// Enhanced animations with dramatic scale effects
const enhanceProjectAnimations = () => {
  // Hero section animations with scale
  const heroTitle = document.querySelector("#heroServicesTitle");
  const heroDesc = document.querySelector("#heroServicesDesc");
  const heroScroll = document.querySelector("#heroServicesScroll");

  // Initial state
  gsap.set([heroTitle, heroDesc], {
    opacity: 0,
    scale: 0.8,
    transformOrigin: "center",
  });
  gsap.set(heroScroll, { opacity: 0, y: 30 });

  // Animation timeline
  const heroTl = gsap.timeline();

  heroTl
    .to(heroTitle, {
      opacity: 1,
      scale: 1,
      duration: 1.2,
      ease: "back.out(1.7)",
    })
    .to(
      heroDesc,
      {
        opacity: 1,
        scale: 1,
        duration: 1.2,
        ease: "back.out(1.7)",
      },
      "-=0.8"
    )
    .to(
      heroScroll,
      {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "power2.out",
      },
      "-=0.5"
    );

  // Subtle floating animation for scroll text
  gsap.to(heroScroll, {
    y: 10,
    duration: 1.5,
    repeat: -1,
    yoyo: true,
    ease: "sine.inOut",
  });

  // Enhanced project card animations with more dramatic scale effects
  document.querySelectorAll(".project-section").forEach((section) => {
    const card = section.querySelector(".project-card");
    const imgCard = section.querySelector(".project-image");
    const title = section.querySelector(".project-title");
    const desc = section.querySelector(".project-desc");
    const tech = section.querySelector(".project-tech");
    const button = section.querySelector(".project-button");

    // Set initial states with more dramatic scale
    gsap.set(card, { scale: 0.85, transformOrigin: "center" });
    gsap.set(imgCard, { scale: 0.9, transformOrigin: "center" });
    gsap.set([title, desc, tech, button], {
      scale: 0.9,
      y: 40,
      opacity: 0,
      transformOrigin: "left",
    });

    // Create ScrollTrigger for enhanced animations
    ScrollTrigger.create({
      trigger: section,
      start: "top 70%",
      end: "bottom 20%",
      onEnter: () => {
        // Scale up animation for the card with bounce effect
        gsap.to(card, {
          scale: 1,
          duration: 1,
          ease: "back.out(1.7)",
        });

        // Scale up animation for the image with slight delay
        gsap.to(imgCard, {
          scale: 1,
          duration: 0.8,
          delay: 0.1,
          ease: "back.out(1.7)",
        });

        // Scale up animation for text elements with stagger
        gsap.to([title, desc, tech, button], {
          scale: 1,
          y: 0,
          opacity: 1,
          duration: 0.7,
          stagger: 0.15,
          ease: "back.out(1.2)",
        });
      },
      onLeave: () => {
        // More noticeable scale down when scrolling past
        gsap.to(card, {
          scale: 0.92,
          duration: 0.5,
          ease: "power2.in",
        });

        gsap.to(imgCard, {
          scale: 0.95,
          duration: 0.4,
          ease: "power2.in",
        });

        gsap.to([title, desc, tech, button], {
          scale: 0.95,
          y: 10,
          opacity: 0.7,
          duration: 0.3,
          stagger: 0.05,
          ease: "power2.in",
        });
      },
      onEnterBack: () => {
        // Scale back up when scrolling back
        gsap.to(card, {
          scale: 1,
          duration: 0.7,
          ease: "back.out(1.7)",
        });

        gsap.to(imgCard, {
          scale: 1,
          duration: 0.6,
          ease: "back.out(1.7)",
        });

        gsap.to([title, desc, tech, button], {
          scale: 1,
          y: 0,
          opacity: 1,
          duration: 0.5,
          stagger: 0.1,
          ease: "back.out(1.2)",
        });
      },
      onLeaveBack: () => {
        // More dramatic scale down when scrolling back past
        gsap.to(card, {
          scale: 0.85,
          duration: 0.5,
          ease: "power2.in",
        });

        gsap.to(imgCard, {
          scale: 0.9,
          duration: 0.4,
          ease: "power2.in",
        });

        gsap.to([title, desc, tech, button], {
          scale: 0.9,
          y: 40,
          opacity: 0,
          duration: 0.3,
          stagger: 0.05,
          ease: "power2.in",
        });
      },
    });
  });

  // CTA section animations with more dramatic scale effects
  const ctaSection = document.querySelector("#cta");
  const ctaContent = document.querySelector("#ctaContent");
  const ctaTitle = ctaContent?.querySelector(".cta-title");
  const ctaDesc = ctaContent?.querySelector(".cta-desc");
  const ctaButtons = ctaContent?.querySelectorAll(".cta-button");

  // Set initial states with more dramatic scale
  gsap.set(ctaContent, { opacity: 0, scale: 0.8, transformOrigin: "center" });
  gsap.set([ctaTitle, ctaDesc], {
    opacity: 0,
    y: 50,
    scale: 0.9,
    transformOrigin: "center",
  });
  gsap.set(ctaButtons, {
    opacity: 0,
    y: 30,
    scale: 0.8,
    transformOrigin: "center",
  });

  ScrollTrigger.create({
    trigger: ctaSection,
    start: "top 70%",
    onEnter: () => {
      // Scale up animation for the container with more bounce
      gsap.to(ctaContent, {
        opacity: 1,
        scale: 1,
        duration: 1,
        ease: "back.out(1.7)",
      });

      // Scale up animation for text elements
      gsap.to([ctaTitle, ctaDesc], {
        opacity: 1,
        y: 0,
        scale: 1,
        duration: 0.8,
        stagger: 0.2,
        ease: "back.out(1.4)",
        delay: 0.3,
      });

      // Scale up animation for buttons with more bounce
      gsap.to(ctaButtons, {
        opacity: 1,
        y: 0,
        scale: 1,
        duration: 0.7,
        stagger: 0.15,
        ease: "back.out(2.0)",
        delay: 0.7,
      });
    },
    onLeave: () => {
      // Scale down when scrolling past
      gsap.to(ctaContent, {
        scale: 0.95,
        opacity: 0.8,
        duration: 0.5,
        ease: "power2.in",
      });
    },
    onEnterBack: () => {
      // Scale back up when scrolling back
      gsap.to(ctaContent, {
        scale: 1,
        opacity: 1,
        duration: 0.7,
        ease: "back.out(1.7)",
      });
    },
  });
};

// mounting
onMounted(() => {
  window.addEventListener("resize", handleResize);

  // Wait for DOM to be fully ready
  setTimeout(() => {
    if (widthMobile.value > 500) {
      animateProjects();
    } else {
      animateProjectsMobile();
    }

    // Add enhanced animations
    enhanceProjectAnimations();
  }, 200);
});

// cleanup
onUnmounted(() => {
  window.removeEventListener("resize", handleResize);
  ScrollTrigger.getAll().forEach((trigger) => trigger.kill());
});
</script>

<style scoped>
.horizontal .content {
  display: grid;
  place-items: center;
  flex-shrink: 0;
}

/* Ensure text gradient works */
.bg-clip-text {
  -webkit-background-clip: text;
  background-clip: text;
}

/* Add transform-style for better 3D effect */
.project-card {
  transform-style: preserve-3d;
  will-change: transform;
  perspective: 1000px;
}

.project-image img {
  transform-style: preserve-3d;
  will-change: transform;
}

@media (max-width: 500px) {
  /* Global structure changes */
  #services {
    display: block;
    height: auto;
    overflow-x: visible;
    overflow-y: auto;
  }

  .horizontal {
    display: block;
  }

  .horizontal .content {
    display: block;
    min-width: auto;
    min-height: auto;
    width: 100%;
    height: auto;
    transform: none !important; /* Prevent GSAP horizontal scrolling on mobile */
  }

  /* Hero section */
  #hero {
    padding: 2rem 1rem;
    height: auto;
    min-height: auto;
  }

  #heroServices {
    flex-direction: column-reverse;
    margin: 0;
    border-width: 1px;
  }

  #heroServicesTitle {
    width: 100%;
    font-size: 2rem;
    padding: 1rem;
    border-bottom: 1px solid #4b5563;
    border-right: none;
    border-left: none;
    border-top: none;
    margin-bottom: 0;
    line-height: 1.2;
  }

  #heroServicesDesc {
    width: 100%;
    padding: 1rem;
    font-size: 1rem;
    border-right: none;
    line-height: 1.5;
  }

  #heroServicesScroll {
    display: none;
  }

  /* Project sections */
  #projects {
    padding: 2rem 1rem;
    height: auto;
    min-height: auto;
    margin-bottom: 2rem;
  }

  #projectCard {
    grid-template-columns: 1fr;
    gap: 1rem;
  }

  #imgCard {
    height: 200px;
  }

  #detailsCard {
    padding: 1rem;
  }

  #detailsCard h2 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
  }

  #detailsCard p {
    font-size: 0.875rem;
    margin-bottom: 0.75rem;
    line-height: 1.4;
  }

  .framework {
    margin-bottom: 1rem;
  }

  .framework h3 {
    font-size: 1rem;
    margin-bottom: 0.5rem;
  }

  .framework div span {
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
  }

  #detailsCard button {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
  }

  #detailsCard button svg {
    width: 0.75rem;
    height: 0.75rem;
  }

  /* CTA section */
  #cta {
    padding: 2rem 1rem;
    height: auto;
    min-height: auto;
  }

  #ctaContent {
    padding: 1.5rem 1rem;
    width: 100%;
    margin: 0 auto;
  }

  #ctaContent h2 {
    font-size: 1.2rem;
    margin-bottom: 0.75rem;
  }

  #ctaContent p {
    font-size: 0.875rem;
    margin-bottom: 1rem;
  }

  #ctaContent div {
    gap: 0.5rem;
  }

  #ctaContent div button {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
  }
}
</style>
