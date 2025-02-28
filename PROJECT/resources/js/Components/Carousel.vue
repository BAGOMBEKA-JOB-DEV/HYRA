<template>
  <div class="relative  overflow-hidden items-center">
    <!-- Carousel Items Container -->
    <div class="flex transition-transform duration-500 ease-in-out" :style="{
      transform: `translateX(-${currentIndex * 100}%)`
    }">
      <!-- Carousel Items Loop -->
      <div v-for="(item, index) in items" :key="index"
        class="flex-shrink-0 w-full h-[400px] bg-cover object-fit bg-center rounded-md"
        :style="{ backgroundImage: `url(${item.image})` }">
        <!-- You can add additional content here inside the image div -->
      </div>
    </div>

    <!-- Carousel Controls (Prev & Next) -->
    <!-- <button
        class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-md"
        @click="prevSlide"
      >
        &#8592;
      </button>-->
    <button class="absolute top-4/5 -mt-10 mr-6 right-0 transform -translate-y-1/2 bg-orange-600 hover:bg-orange-700  text-white p-2
         rounded-full shadow-2xl w-[200px] flex items-center justify-center 
         space-x-2 hover:space-x-6 transition-transform duration-500 ease-out" @click="nextSlide">
      <span>Shop Now!</span>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-5 animate-ping  font-bold">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
      </svg>
    </button>


    <!-- Indicators (Dot Navigation) -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <button v-for="(item, index) in items" :key="index" class="w-2 h-2 rounded-full" :class="{
        'bg-gray-500': currentIndex !== index,
        'bg-gray-900': currentIndex === index
      }" @click="goToSlide(index)" />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Props definition
const props = defineProps({
  items: {
    type: Array,
    required: true,
    default: () => []
  },
  interval: {
    type: Number,
    default: 5000
  }
});

const currentIndex = ref(0);

// Navigate to the previous slide
const prevSlide = () => {
  currentIndex.value = (currentIndex.value - 1 + props.items.length) % props.items.length;
};

// Navigate to the next slide
const nextSlide = () => {
  currentIndex.value = (currentIndex.value + 1) % props.items.length;
};

// Go to a specific slide
const goToSlide = (index) => {
  currentIndex.value = index;
};

// Automatically move to the next slide at a regular interval
setInterval(() => {
  nextSlide();
}, props.interval);
</script>

<!-- Styles are managed using Tailwind CSS -->