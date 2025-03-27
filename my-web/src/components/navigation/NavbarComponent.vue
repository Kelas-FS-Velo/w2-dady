<script setup>
import { ref, onMounted, onUnmounted } from "vue";

const menu = ref([
  { id: 1, name: "Home", link: "#home" },
  { id: 2, name: "About", link: "#about" },
  { id: 3, name: "Services", link: "#services" },
  { id: 4, name: "Contact", link: "#contact" },
]);

const isScrolled = ref(false);
const isSideMenuOpen = ref(false);
const isAnimationComplete = ref(false);

const handleScroll = () => {
  isScrolled.value = window.scrollY > window.innerHeight - 20;

  if (!isScrolled.value && isSideMenuOpen.value) {
    closeSideMenu();
  }
};

const toggleSideMenu = () => {
  if (!isSideMenuOpen.value) {
    openSideMenu();
  } else {
    closeSideMenu();
  }
};

const openSideMenu = () => {
  isSideMenuOpen.value = true;
  isAnimationComplete.value = false;

  setTimeout(() => {
    isAnimationComplete.value = true;
  }, 600);
};

const closeSideMenu = () => {
  isSideMenuOpen.value = false;
  isAnimationComplete.value = false;
};

onMounted(() => {
  window.addEventListener("scroll", handleScroll);
  handleScroll();
});

onUnmounted(() => {
  window.removeEventListener("scroll", handleScroll);
});
</script>

<template>
  <nav
    id="navbar"
    :class="[
      'fixed top-0 text-gray-400 w-full shadow-none z-50 flex items-center justify-between px-8 py-6 transition-all duration-300 ease-in-out',
      isScrolled ? 'bg-black' : 'bg-transparent',
    ]"
  >
    <div class="nav-header">
      <a
        href="/"
        :class="['navbar-brand cursor-pointer text-2xl font-normal flex items-center hover:bg-gradient-to-r hover:from-blue-400 hover:to-purple-600 hover:bg-clip-text hover:text-transparent transition-all duration-500 ease-in-out',
          isScrolled ? 'text-gray-400' :''
        ]"
        >&copy; workerharder</a
      >
    </div>

    <ul
      v-if="
        (!isScrolled || (isScrolled && isAnimationComplete)) && !isSideMenuOpen
      "
      class="nav-navbar hidden md:flex items-center justify-evenly space-x-8"
    >
      <li v-for="item in menu" :key="item.id" class="nav-item relative group">
        <a
          v-smooth-scroll
          :href="item.link"
          class="nav-link font-normal capitalize text-xl hover:text-white transition-all duration-300 ease-in-out"
          >{{ item.name }}</a
        >
        <span
          class="absolute -bottom-2 left-0 w-0 h-0.5 bg-gray-400 transition-all duration-300 ease-in-out group-hover:w-8"
        ></span>
      </li>
    </ul>

    <button
      v-if="isScrolled && !isSideMenuOpen"
      @click="toggleSideMenu"
      class="hamburger-menu bg-gray-900 rounded-[10px] cursor-pointer flex flex-col justify-center items-center w-10 h-10 relative focus:outline-none transition-all duration-300 ease-in-out"
      aria-label="Menu"
    >
      <span class="w-6 h-0.5 bg-white mb-1.5 transition-all"></span>
      <span class="w-6 h-0.5 bg-white mb-1.5 transition-all"></span>
      <span class="w-6 h-0.5 bg-white transition-all"></span>
    </button>

    <button
      v-if="isSideMenuOpen"
      @click="closeSideMenu"
      class="close-menu bg-black/90 cursor-pointer flex justify-center items-center w-10 h-10 relative focus:outline-none z-50"
      aria-label="Close Menu"
    >
      <span class="w-6 h-0.5 bg-white transform rotate-45 absolute"></span>
      <span class="w-6 h-0.5 bg-white transform -rotate-45 absolute"></span>
    </button>
  </nav>

  <div
    v-if="isSideMenuOpen"
    class="fixed inset-0 z-40 overflow-hidden"
    @click.self="closeSideMenu"
  >
    <div
      class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-500"
      :class="{ 'opacity-100': isSideMenuOpen, 'opacity-0': !isSideMenuOpen }"
    ></div>

    <div
      class="absolute top-0 right-0 w-full md:w-96 h-full bg-black transform transition-transform duration-500 ease-out"
      :class="{
        '-translate-x-0': isSideMenuOpen,
        'translate-x-full': !isSideMenuOpen,
      }"
    >
      <div class="flex flex-col h-full pt-24 px-8">
        <ul class="space-y-8">
          <li
            v-for="(item, index) in menu"
            :key="item.id"
            class="side-nav-item transform transition-all duration-500"
            :class="{
              'translate-x-0 opacity-100': isSideMenuOpen,
              'translate-x-8 opacity-0': !isSideMenuOpen,
            }"
            :style="{ transitionDelay: `${index * 100}ms` }"
          >
            <a
              v-smooth-scroll
              :href="item.link"
              class="text-gray-400 text-2xl font-normal capitalize hover:text-white hover:pl-2 transition-all duration-300 flex items-center"
              @click="closeSideMenu"
            >
              <span
                class="w-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-600 mr-0 transition-all duration-300 side-nav-line"
              ></span>
              {{ item.name }}
            </a>
          </li>
        </ul>

        <div
          class="mt-auto mb-12 transform transition-all duration-500"
          :class="{
            'translate-y-0 opacity-100': isSideMenuOpen,
            'translate-y-8 opacity-0': !isSideMenuOpen,
          }"
          :style="{ transitionDelay: `${menu.length * 100 + 100}ms` }"
        >
          <div class="text-gray-400 mb-6">
            <h3 class="text-white text-xl mb-4">Get in touch</h3>
            <p class="mb-2">dadybima171@gmail.com</p>
          </div>

          <div class="flex space-x-4">
            <a
              href="https://www.linkedin.com/in/dady-bima/"
              class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-gray-700 transition-colors"
            >
              <svg
                class="w-5 h-5 text-gray-400"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11.75 19h-2.5v-8.5h2.5v8.5zm-1.25-9.75c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13 9.75h-2.5v-4.25c0-1.02-.02-2.33-1.42-2.33-1.42 0-1.64 1.11-1.64 2.25v4.33h-2.5v-8.5h2.4v1.16h.03c.33-.63 1.14-1.29 2.35-1.29 2.51 0 2.97 1.65 2.97 3.8v4.83z"
                ></path>
              </svg>
            </a>
            <a
              href="http://instagram.com/dybim"
              class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-gray-700 transition-colors"
            >
              <svg
                class="w-5 h-5 text-gray-400"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.bg-clip-text {
  -webkit-background-clip: text;
  background-clip: text;
}

.text-transparent {
  color: transparent;
}

.side-nav-item:hover .side-nav-line {
  width: 24px;
  margin-right: 12px;
}

.hamburger-menu:hover span:nth-child(1) {
  width: 24px;
}

.hamburger-menu:hover span:nth-child(2) {
  width: 18px;
}

.hamburger-menu:hover span:nth-child(3) {
  width: 12px;
}

.close-menu span {
  transition: transform 0.3s ease;
}

.close-menu:hover span:nth-child(1) {
  transform: rotate(135deg) scale(1.2);
}

.close-menu:hover span:nth-child(2) {
  transform: rotate(-135deg) scale(1.2);
}
@media (max-width: 500px) {
  .navbar-brand {
    font-size: 1rem;
  }
}

</style>
