<template>
    <div class="fixed bottom-8 right-8 z-50">
        <button
        class="bg-blue-500 text-white rounded-full p-4 shadow-lg hover:bg-blue-600 transition-all duration-300 ease-in-out"
        >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
            />
        </svg>
        </button>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";

const scrollY = ref(0);
const hidden = ref(false);

watch(()=> {
    if (scrollY.value > 100) {
        hidden.value = true;
    } else {
        hidden.value = false;
    }
})

window.addEventListener("scroll", () => {
    scrollY.value = window.scrollY;
});

const menu = ref([
    { id: 1, name: "Home", link: "#home" },
    { id: 2, name: "About", link: "#about" },
    { id: 3, name: "Services", link: "#services" },
    { id: 4, name: "Contact", link: "#contact" },
]);


</script>
