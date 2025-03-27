<template>
  <motion.div
    id="about"
    class="min-h-screen flex flex-col items-center justify-center gap-5 bg-black p-4"
  >
    <div
      class="flex flex-col md:flex-row items-center justify-center container mx-auto border border-gray-700 rounded-[10px]"
    >
      <!-- Image Section - Full width on mobile, half width on desktop -->
      <div
        class="w-full md:w-6/12 mx-auto border border-gray-700 p-3 md:p-5 about-section"
      >
        <div
          class="w-full max-w-[350px] mx-auto h-auto border border-white rounded-[10px] p-2.5 bg-black"
          style="box-shadow: 0 0 30px 1px rgba(255, 255, 255, 0.5)"
          @mouseover="handleMouseOver"
          @touchstart="handleTouchStart"
          @touchmove="handleTouchMove"
          @touchend="handleTouchEnd"
          @mouseleave="handleMouseLeave"
          :style="cardStyle"
          ref="cardRef"
        >
          <img
            ref="cardShine"
            class="rounded-[5px] w-full"
            src="../../assets/picture/gunung.jpg"
            alt="Mountain"
          />
        </div>
        <p
          class="text-3xl capitalize text-white font-semibold tracking-wide text-center my-5 p-3 rounded-[10px] border border-gray-700 max-w-sm mx-auto"
        >
          hi i'm dady bima
        </p>
      </div>

      <!-- Content Section - Full width on mobile, half width on desktop -->
      <div class="w-full md:w-6/12 border border-gray-700 p-3 md:p-5">
        <div class="wrapper text-white flex flex-col items-start gap-5">
          <!-- Description -->
          <div
            class="desc text-base md:text-xl tracking-wider text-white text-justify about-section"
          >
            Welcome to my personal website. I am a web developer who is
            passionate about creating web applications. I have experience in
            developing web applications using various technologies. I am also a
            fast learner and always eager to learn new things. I am currently
            looking for a job as a web developer. If you are interested in
            hiring me, please contact me.
          </div>

          <!-- Tech Stack -->
          <div class="tech-stack w-full about-section">
            <div class="title text-2xl md:text-3xl font-semibold">
              My Tech Stack
            </div>

            <!-- Framework and Database -->
            <p class="title text-lg md:text-xl font-semibold mt-5 mb-3">
              Framework and Database
            </p>
            <div
              class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 items-center gap-2 md:gap-3"
            >
              <div
                v-for="item in menu.filter(
                  (item) =>
                    item.category === 'Framework' ||
                    item.category === 'Database' ||
                    item.category === 'Library'
                )"
                :key="item.id"
                class="tech-item wrapper bg-white rounded-[10px] p-1.5 md:p-2.5 flex items-center justify-center"
              >
                <img
                  class="w-8 h-8 md:w-12 md:h-12"
                  :src="item.src"
                  :alt="item.alt"
                />
              </div>
            </div>

            <!-- Programming Language -->
            <p class="title text-lg md:text-xl font-semibold mt-5 mb-3">
              Programming Language
            </p>
            <div
              class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 items-center gap-2 md:gap-3"
            >
              <div
                v-for="item in menu.filter(
                  (item) => item.category === 'Programming Language'
                )"
                :key="item.id"
                class="tech-item wrapper bg-white rounded-[10px] p-1.5 md:p-2.5 flex items-center justify-center"
              >
                <img
                  class="w-8 h-8 md:w-12 md:h-12"
                  :src="item.src"
                  :alt="item.alt"
                />
              </div>
            </div>

            <!-- Operating System or Tools -->
            <p class="title text-lg md:text-xl font-semibold mt-5 mb-3">
              Operating System or Tools
            </p>
            <div
              class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 items-center gap-2 md:gap-3"
            >
              <div
                v-for="item in menu.filter(
                  (item) =>
                    item.category === 'Operating System' ||
                    item.category === 'Tool'
                )"
                :key="item.id"
                class="tech-item wrapper bg-white rounded-[10px] p-1.5 md:p-2.5 flex items-center justify-center"
              >
                <img
                  class="w-8 h-8 md:w-12 md:h-12"
                  :src="item.src"
                  :alt="item.alt"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </motion.div>
</template>

<script setup>
import { ref } from "vue";

import htmlLogo from "../../assets/picture/HTML5.svg";
import cssLogo from "../../assets/picture/CSS3.svg";
import tailwind from "../../assets/picture/Tailwind CSS.svg";
import reactLogo from "../../assets/picture/React.svg";
import nextLogo from "../../assets/picture/Next.js.svg";
import vueLogo from "../../assets/picture/Vue.js.svg";
import nuxtLogo from "../../assets/picture/Nuxt JS.svg";
import laravelLogo from "../../assets/picture/Laravel.svg";
import nodeLogo from "../../assets/picture/Node.js.svg";
import Axios from "../../assets/picture/Azios.svg";
import github from "../../assets/picture/GitHub.svg";
import linux from "../../assets/picture/Linux.svg";
import materialUI from "../../assets/picture/Material UI.svg";
import MongoDB from "../../assets/picture/MongoDB.svg";
import python from "../../assets/picture/Python.svg";
import ts from "../../assets/picture/TypeScript.svg";
import redux from "../../assets/picture/Redux.svg";
import vite from "../../assets/picture/Vite.js.svg";
import js from "../../assets/picture/JavaScript.svg";
import mySql from "../../assets/picture/MySQL.svg";
import Windows from "../../assets/picture/Windows 11.svg";
import Express from "../../assets/picture/Express.svg";
import Php from "../../assets/picture/PHP.svg";

import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

if (typeof window !== "undefined") {
  gsap.registerPlugin(ScrollTrigger);
}
const cardRef = ref(null);
const cardShine = ref(null);
const cardStyle = ref({});

const handleMouseOver = (e) => {
  const card = e.currentTarget;
  const rect = card.getBoundingClientRect();
  const centerX = rect.left + rect.width / 2;
  const centerY = rect.top + rect.height / 2;

  const updateCardStyle = (event) => {
    const mouseX = event.clientX - centerX;
    const mouseY = event.clientY - centerY;

    const rotateX = (mouseY / rect.height) * -30;
    const rotateY = -(mouseX / rect.width) * -30;

    cardStyle.value = {
      transform: `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1)`,
      transition: "transform 0.1s ease",
    };
  };

  const stopTracking = () => {
    cardStyle.value = {
      transform: "perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)",
      transition: "transform 0.3s ease",
    };
    window.removeEventListener("mousemove", updateCardStyle);
    card.removeEventListener("mouseleave", stopTracking);
  };

  window.addEventListener("mousemove", updateCardStyle);
  card.addEventListener("mouseleave", stopTracking);
};

const handleMouseLeave = () => {
  cardStyle.value = {
    transform: "perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)",
    transition: "transform 0.3s ease",
  };
};

// Touch event handlers for mobile devices
const handleTouchStart = (e) => {
  if (!cardRef.value) return;

  const touch = e.touches[0];

  touchStartX = touch.clientX;
  touchStartY = touch.clientY;

  // Prevent default to avoid scrolling while interacting with the card
  e.preventDefault();
};

const handleTouchMove = (e) => {
  if (!cardRef.value) return;

  const touch = e.touches[0];
  const rect = cardRef.value.getBoundingClientRect();
  const centerX = rect.left + rect.width / 2;
  const centerY = rect.top + rect.height / 2;

  const touchX = touch.clientX - centerX;
  const touchY = touch.clientY - centerY;

  const rotateX = (touchY / rect.height) * -20; // Reduced intensity for mobile
  const rotateY = -(touchX / rect.width) * -20; // Reduced intensity for mobile

  cardStyle.value = {
    transform: `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1)`,
    transition: "transform 0.1s ease",
  };

  // Prevent default to avoid scrolling while interacting with the card
  e.preventDefault();
};

const handleTouchEnd = () => {
  cardStyle.value = {
    transform: "perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)",
    transition: "transform 0.5s ease", // Slightly longer transition for touch
  };
};

const menu = ref([
  { id: 1, src: htmlLogo, alt: "HTML", category: "Programming Language" },
  { id: 2, src: cssLogo, alt: "CSS", category: "Programming Language" },
  { id: 3, src: tailwind, alt: "Tailwind", category: "Framework" },
  { id: 4, src: reactLogo, alt: "React", category: "Framework" },
  { id: 5, src: nextLogo, alt: "Next.js", category: "Framework" },
  { id: 6, src: vueLogo, alt: "Vue", category: "Framework" },
  { id: 7, src: nuxtLogo, alt: "Nuxt", category: "Framework" },
  { id: 8, src: laravelLogo, alt: "Laravel", category: "Framework" },
  { id: 9, src: nodeLogo, alt: "Node.js", category: "Framework" },
  { id: 10, src: Axios, alt: "Axios", category: "Library" },
  { id: 11, src: github, alt: "Github", category: "Tool" },
  { id: 12, src: linux, alt: "Linux", category: "Operating System" },
  { id: 13, src: materialUI, alt: "Material UI", category: "Framework" },
  { id: 14, src: MongoDB, alt: "MongoDB", category: "Database" },
  { id: 15, src: python, alt: "Python", category: "Programming Language" },
  { id: 16, src: ts, alt: "TypeScript", category: "Programming Language" },
  { id: 17, src: redux, alt: "Redux", category: "Library" },
  { id: 18, src: vite, alt: "Vite", category: "Framework" },
  { id: 19, src: js, alt: "JavaScript", category: "Programming Language" },
  { id: 20, src: mySql, alt: "MySQL", category: "Database" },
  { id: 21, src: Windows, alt: "Windows", category: "Operating System" },
  { id: 22, src: Express, alt: "Express", category: "Framework" },
  { id: 23, src: Php, alt: "Php", category: "Programming Language" },
]);

onMounted(() => {
  gsap.set(".about-section", {
    opacity: 0,
    y: 50
  })

  gsap.set(".tech-item", {
    opacity: 0,
    scale: 0.8
  })

  const sections = document.querySelectorAll('.about-section')
  sections.forEach((section) => {
    ScrollTrigger.create({
      trigger: section,
      start: "top 80%",
      end: "bottom 20%",
      toggleActions: "play reverse play reverse",
      onEnter: () => {
        gsap.to(section, {
          opacity: 1,
          y: 0,
          duration: 0.8,
          ease: "power2.out"
        })
      },
      onLeave: () => {
        gsap.to(section, {
          opacity: 0,
          duration: 0.8,
          ease: "power2.in"
        })
      },
      onEnterBack: () => {
        gsap.to(section, {
          opacity: 1,
          y: 0,
          duration: 0.8,
          ease: "power2.out"
        })
      },
      onLeaveBack: () => {
        gsap.to(section, {
          opacity: 0,
          y: 50,
          duration: 0.8,
          ease: "power2.in"
        })
      }
    })
  })

  const techItemsContainer = document.querySelector('.tech-stack')
  if (techItemsContainer) {
    ScrollTrigger.create({
      trigger: techItemsContainer,
      start: "top 80%",
      end: "bottom 20%",
      onEnter: () => {
        gsap.to(".tech-item", {
          opacity: 1,
          scale: 1,
          duration: 0.5,
          stagger: 0.05,
          ease: "back.out(1.7)"
        })
      },
      onLeave: () => {
        gsap.to(".tech-item", {
          opacity: 0,
          scale: 0.8,
          duration: 0.5,
          stagger: 0.03,
          ease: "power2.in"
        })
      },
      onEnterBack: () => {
        gsap.to(".tech-item", {
          opacity: 1,
          scale: 1,
          duration: 0.5,
          stagger: 0.05,
          ease: "back.out(1.7)"
        })
      },
      onLeaveBack: () => {
        gsap.to(".tech-item", {
          opacity: 0,
          scale: 0.8,
          duration: 0.5,
          stagger: 0.03,
          ease: "power2.in"
        })
      }
    })
  }
  const card = cardRef.value
  if (!card) return


  onUnmounted(() => {
    ScrollTrigger.getAll().forEach(trigger => trigger.kill())
  })
});
</script>

<style>
/* Add any additional styles here */
@media (max-width: 768px) {
  #about {
    padding-top: 2rem;
    padding-bottom: 2rem;
    justify-content: flex-start;
  }
}
</style>
