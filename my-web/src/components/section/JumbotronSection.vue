<template>
  <div
    id="home"
    class="min-h-screen py-10 bg-black text-white flex flex-col justify-center relative overflow-hidden"
  >
    <div class="absolute inset-0 z-0">
      <div
        class="absolute top-20 left-10 w-60 h-60 bg-blue-500/10 rounded-full blur-3xl"
      ></div>
      <div
        class="absolute bottom-20 right-10 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"
      ></div>
    </div>

    <div
      ref="marqueeRef"
      class="marquee-container py-4 bg-gradient-to-r from-blue-900/30 to-purple-900/30 mb-12 relative z-10"
    >
      <div class="marquee-content">
        <span v-for="i in 10" :key="i" class="mx-4"
          >✨ Welcome to my creative portfolio ✨</span
        >
      </div>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10">
      <h1 ref="titleRef" class="text-5xl md:text-7xl font-bold mb-6">
        <span
          class="bg-gradient-to-r from-blue-400 to-purple-600 bg-clip-text text-transparent"
        >
          Hi there!
        </span>
      </h1>

      <div
        ref="subtitleRef"
        class="h-16 md:h-20 flex items-center justify-center mb-8"
      >
        <h2 class="text-2xl md:text-4xl font-medium">
          <span>I'm a </span>
          <span class="typing-text">{{ displayText }}</span>
          <span class="typing-cursor">|</span>
        </h2>
      </div>

      <p
        ref="descriptionRef"
        class="text-xl text-gray-400 max-w-2xl mx-auto mb-10"
      >
        Bringing your digital ideas to life with creative design and
        cutting-edge technology. Let's build something amazing together.
      </p>

      <div
        ref="buttonRef"
        class="flex flex-col sm:flex-row gap-4 justify-center"
      >
        <button
          class="px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 rounded-md font-medium transition-colors"
        >
          Explore My Work
        </button>
        <button
          ref="buttonRefs"
          class="px-8 py-3 border border-white/20 hover:bg-white/10 rounded-md font-medium transition-colors"
        >
          Contact Me
        </button>
      </div>
    </div>

    <div
      class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-purple-600"
    ></div>

    <div
      class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-400 rounded-full animate-pulse"
    ></div>
    <div
      class="absolute top-1/3 right-1/4 w-3 h-3 bg-purple-400 rounded-full animate-pulse"
      style="animation-delay: 1s"
    ></div>
    <div
      class="absolute bottom-1/4 left-1/3 w-2 h-2 bg-blue-400 rounded-full animate-pulse"
      style="animation-delay: 0.5s"
    ></div>
    <div
      class="absolute top-2/3 right-1/3 w-3 h-3 bg-purple-400 rounded-full animate-pulse"
      style="animation-delay: 1.5s"
    ></div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

if (typeof window !== "undefined") {
  gsap.registerPlugin(ScrollTrigger);
}

const textOptions = [
  "Web Developer",
  "Creative Thinker",
  "Problem Solver",
  "Lifelong Learner",
  "Tech Enthusiast",
  "Open Source Enthusiast",
];

const displayText = ref("");
const currentTextIndex = ref(0);
const currentCharIndex = ref(0);
const isDeleting = ref(false);
const typingSpeed = ref(100);
let typingTimer = null;

const marqueeRef = ref();
const titleRef = ref();
const subtitleRef = ref(null);
const descriptionRef = ref(null);
const buttonRef = ref(null);

const typeText = () => {
  const currentText = textOptions[currentTextIndex.value];

  if (isDeleting.value) {
    displayText.value = currentText.substring(0, currentCharIndex.value - 1);
    currentCharIndex.value--;
    typingSpeed.value = 50;
  } else {
    displayText.value = currentText.substring(0, currentCharIndex.value + 1);
    currentCharIndex.value++;
    typingSpeed.value = 100;
  }

  if (!isDeleting.value && currentCharIndex.value === currentText.length) {
    isDeleting.value = true;
    typingSpeed.value = 1000;
  } else if (isDeleting.value && currentCharIndex.value === 0) {
    isDeleting.value = false;
    currentTextIndex.value = (currentTextIndex.value + 1) % textOptions.length;
    typingSpeed.value = 500;
  }

  typingTimer = setTimeout(typeText, typingSpeed.value);
};

onMounted(() => {
  typeText();

  gsap.fromTo(
    marqueeRef.value,
    { opacity: 0, y: 50, scale: 0.5 },
    { opacity: 1, y: 0, scale: 1, duration: 2, ease: "power2.out" }
  );

  gsap.fromTo(
    titleRef.value,
    { opacity: 0, y: 50 },
    { opacity: 1, y: 0, duration: 1, ease: "power2.out" }
  );

  gsap.fromTo(
    subtitleRef.value,
    { opacity: 0, y: 20 },
    { opacity: 1, y: 0, duration: 1, ease: "power2.out", delay: 0.5 }
  );

  gsap.fromTo(
    descriptionRef.value,
    { opacity: 0, y: 20 },
    { opacity: 1, y: 0, duration: 1, ease: "power2.out", delay: 1 }
  );

  gsap.fromTo(
    buttonRef.value,
    { opacity: 0, y: 20 },
    { opacity: 1, y: 0, duration: 1, ease: "power2.out", delay: 1.5 }
  );
});

onBeforeUnmount(() => {
  if (typingTimer) {
    clearTimeout(typingTimer);
  }
});
</script>

<style scoped>
.marquee-container {
  width: 100%;
  overflow: hidden;
  white-space: nowrap;
}

.marquee-content {
  display: inline-block;
  animation: marquee 30s linear infinite;
}

@keyframes marquee {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.typing-cursor {
  display: inline-block;
  animation: blink 1s step-end infinite;
}

@keyframes blink {
  from,
  to {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
}

.bg-clip-text {
  -webkit-background-clip: text;
  background-clip: text;
}

@keyframes pulse {
  0%,
  100% {
    opacity: 1;
    transform: scale(1);
  }
  50% {
    opacity: 0.5;
    transform: scale(1.2);
  }
}

.animate-pulse {
  animation: pulse 3s ease-in-out infinite;
}
</style>
