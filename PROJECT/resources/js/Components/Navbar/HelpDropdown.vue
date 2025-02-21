<template>
    <div class="relative inline-block text-left">
      <button
        @click="toggleDropdown"
        class="flex items-center px-4 py-2 rounded-md  
        hover:bg-gray-200 text-gray-500 hover:text-red-500 "
      >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
      stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 text-gray-700 hover:text-orange-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
</svg>

        <span class="text-gray-700 hover:text-orange-500">Help</span>
        <svg :class="{ 'rotate-180': isOpen, 'rotate-0': !isOpen }" class="w-4 h-4 ml-2 text-gray-600 hover:text-orange-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
  
      <div v-if="isOpen"
        class="absolute  mt-2 w-60 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
     
        <ul class="py-3">
          <li class="px-5 py-2 text-black text-sm flex items-center hover:bg-gray-100 cursor-pointer">

            Help Center
          </li>
          <li class="px-5 py-2 text-black text-sm flex items-center hover:bg-gray-100 cursor-pointer">

Place an Order
</li>
<li class="px-5 py-2 text-black text-sm flex items-center hover:bg-gray-100 cursor-pointer">

Returns & Refunds
</li>
         
        </ul>
        <button class="w-4/5 ml-5 mr-1 bg-orange-500  text-white text-center py-2 mb-5  flex
        rounded-md hover:bg-orange-600">
        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" class="size-6 ml-5 mr-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
</svg>
</span>
          Live Help
        </button>


      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isOpen: false,
      };
    },
    methods: {
      toggleDropdown() {
        this.isOpen = !this.isOpen;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add additional styling if needed */
  </style>
  