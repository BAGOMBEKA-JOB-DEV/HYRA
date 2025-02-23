<template>
    <div class="relative  overflow-hidden items-center">
      <!-- Carousel Items Container -->
      <div
        class="flex transition-transform duration-500 ease-in-out"
        :style="{
          transform: `translateX(-${currentIndex * 100}%)`
        }"
      >
        <!-- Carousel Items Loop -->
        <div
          v-for="(item, index) in items"
          :key="index"
          class="flex-shrink-0 w-full h-[400px] bg-cover object-fit bg-center rounded-md"
          :style="{ backgroundImage: `url(${item.image})` }"
        >
          <!-- You can add additional content here inside the image div -->
        </div>
      </div>
  
      <!-- Carousel Controls (Prev & Next) -->
      <!-- <button
        class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-md"
        @click="prevSlide"
      >
        &#8592;
      </button>
      <button
        class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-md"
        @click="nextSlide"
      >
        &#8594;
      </button> -->
  
      <!-- Indicators (Dot Navigation) -->
      <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <button
          v-for="(item, index) in items"
          :key="index"
          class="w-2 h-2 rounded-full"
          :class="{
            'bg-gray-500': currentIndex !== index,
            'bg-gray-900': currentIndex === index
          }"
          @click="goToSlide(index)"
        />
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
  