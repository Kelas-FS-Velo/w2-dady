<template>
  <div id="contact" class="min-h-screen flex justify-center items-center bg-black text-white relative">
    <!-- Contact Section -->
    <section class="container  mx-auto px-4 py-12 mb-20">
      <div
        class="bg-gray-900/60 rounded-xl contact-section overflow-hidden border-2 border-gray-700"
      >
        <div class="grid grid-cols-2 gap-0">
          <!-- Contact Form -->
          <div class="p-12">
            <h2 class="text-2xl font-bold mb-6">Send Me a Message</h2>
            <form class="space-y-6" @submit.prevent="submitForm">
              <div>
                <label for="name" class="block text-sm font-medium mb-2"
                  >Your Name</label
                >
                <input
                  type="text"
                  id="name"
                  v-model="form.name"
                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="John Doe"
                  required
                />
              </div>
              <div>
                <label for="email" class="block text-sm font-medium mb-2"
                  >Your Email</label
                >
                <input
                  type="email"
                  id="email"
                  v-model="form.email"
                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="john@example.com"
                  required
                />
              </div>
              <div>
                <label for="service" class="block text-sm font-medium mb-2"
                  >Service You're Interested In</label
                >
                <select
                  id="service"
                  v-model="form.service"
                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                  <option value="" disabled selected>Select a service</option>
                  <option value="web-development">Web Development</option>
                  <option value="mobile-app">Mobile App Development</option>
                  <option value="ui-ux">UI/UX Design</option>
                  <option value="e-commerce">E-commerce Solutions</option>
                  <option value="digital-marketing">Digital Marketing</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div>
                <label for="message" class="block text-sm font-medium mb-2"
                  >Your Message</label
                >
                <textarea
                  id="message"
                  v-model="form.message"
                  rows="5"
                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Tell us about your project..."
                  required
                ></textarea>
              </div>
              <button
                type="submit"
                class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 rounded-md font-medium transition-colors"
                :disabled="isSubmitting"
              >
                <span v-if="isSubmitting">Sending...</span>
                <span v-else>Send Message</span>
              </button>
              <div
                v-if="showSuccess"
                class="p-4 bg-green-900/50 border border-green-500 rounded-md text-green-200"
              >
                Thank you for your message! We'll get back to you soon.
              </div>
            </form>
          </div>

          <!-- Contact Information -->
          <div
            class="bg-gradient-to-br from-blue-900/20 to-purple-900/20 p-12 flex flex-col"
          >
            <h2 class="text-2xl font-bold mb-8">Contact Information</h2>
            <div class="space-y-6 flex-grow">
              <div class="flex items-start space-x-4">
                <div class="bg-gray-800 p-3 rounded-full">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-blue-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                </div>
                <div>
                  <h3 class="font-medium text-lg">Our Office</h3>
                  <p class="text-gray-400 mt-1">Semarang, Central Java</p>
                </div>
              </div>

              <!-- Email -->
              <div class="flex items-start space-x-4">
                <div class="bg-gray-800 p-3 rounded-full">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-blue-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    />
                  </svg>
                </div>
                <div>
                  <h3 class="font-medium text-lg">Email</h3>
                  <p class="text-gray-400 mt-1">dadybima171@gmail.com</p>
                </div>
              </div>
            </div>

            <!-- Social Media -->
            <div class="mt-12">
              <h3 class="font-medium text-lg mb-4">Follow Us</h3>
              <div class="flex space-x-4">
                <a
                  href="#"
                  class="social-icon w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-gray-700 transition-colors"
                >
                  <svg
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </a>
                <a
                  href="#"
                  class="social-icon w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-gray-700 transition-colors"
                >
                  <svg
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                  >
                    <path
                      d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                    ></path>
                  </svg>
                </a>
                <a
                  href="#"
                  class="social-icon w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-gray-700 transition-colors"
                >
                  <svg
                    class="w-5 h-5"
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
                <a
                  href="#"
                  class="social-icon w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-gray-700 transition-colors"
                >
                  <svg
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, reactive } from "vue";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

if (typeof window !== "undefined") {
  gsap.registerPlugin(ScrollTrigger);
}

const form = reactive({
  name: "",
  email: "",
  service: "",
  message: "",
});
const isSubmitting = ref(false);
const showSuccess = ref(false);

const submitForm = () => {
  isSubmitting.value = true;
  setTimeout(() => {
    form.name = "";
    form.email = "";
    form.service = "";
    form.message = "";
    showSuccess.value = true;
    isSubmitting.value = false;
    setTimeout(() => {
      showSuccess.value = false;
    }, 5000);
  }, 1500);
};
</script>

<style scoped>
.bg-clip-text {
  -webkit-background-clip: text;
  background-clip: text;
}
.text-transparent {
  color: transparent;
}

/* Mobile Responsive Styles */
@media (max-width: 768px) {
  .grid-cols-2 {
    grid-template-columns: 1fr;
  }

  .p-12 {
    padding: 2rem;
  }

  .mb-20 {
    margin-bottom: 3rem;
  }

  .text-2xl {
    font-size: 1.25rem;
  }

  .space-y-6 > * + * {
    margin-top: 1rem;
  }

  .py-3 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }
}

/* Small Mobile Devices */
@media (max-width: 500px) {
  /* Use more specific selectors to prevent conflicts */
  #contact .p-12 {
    padding: 1.25rem;
  }

  #contact .container {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
  }

  #contact .text-2xl {
    font-size: 1.125rem;
  }

  #contact .text-lg {
    font-size: 0.875rem;
  }

  #contact .py-12 {
    padding-top: 2rem;
    padding-bottom: 2rem;
  }

  #contact .px-6 {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  #contact .py-3 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }

  #contact .space-x-4 {
    gap: 0.5rem;
  }

  /* Use class selectors for social icons to avoid conflicts */
  #contact .social-icon {
    width: 2rem;
    height: 2rem;
  }

  #contact .social-icon svg {
    width: 1rem;
    height: 1rem;
  }

  /* Icon sizes with more specific selectors */
  #contact .h-6,
  #contact .w-6 {
    width: 1.25rem;
    height: 1.25rem;
  }

  #contact .rounded-xl {
    border-radius: 0.5rem;
  }

  #contact .mb-8 {
    margin-bottom: 1rem;
  }

  #contact .mb-6 {
    margin-bottom: 0.75rem;
  }

  #contact .mb-4 {
    margin-bottom: 0.5rem;
  }

  #contact .mb-2 {
    margin-bottom: 0.25rem;
  }

  #contact .mt-12 {
    margin-top: 1.5rem;
  }

  /* Fix email overflow */
  #contact .text-gray-400 {
    word-break: break-word;
  }

  /* Adjust social media icons container */
  #contact .flex.space-x-4 {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
  }
}
</style>