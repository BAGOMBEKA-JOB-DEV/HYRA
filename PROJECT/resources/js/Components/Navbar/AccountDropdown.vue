<template>
    <div class="relative inline-block text-left">
      <button
        @click="toggleDropdown"
        class="flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm 
        bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-red-500 "
      >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
      stroke="currentColor" class="size-6 mr-2 text-gray-700 hover:text-orange-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>

        <span class="text-gray-700 hover:text-orange-500">Account</span>
        <svg :class="{ 'rotate-180': isOpen, 'rotate-0': !isOpen }" class="w-4 h-4 ml-2 text-gray-600 hover:text-orange-500  
      
        " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
  
      <div v-if="isOpen"
        class="absolute  mt-2 w-60 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
        <button class="w-full bg-orange-500 text-white text-center py-2 rounded-t-lg hover:bg-orange-600">
          Sign In
        </button>
        <ul class="py-2">
          <li class="px-4 py-2 text-black flex items-center hover:bg-gray-100 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="size-6 mr-2 text-gray-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
</svg>

            My Account
          </li>
          <li class="px-4 py-2 flex  text-black items-center hover:bg-gray-100 cursor-pointer">
            <svg class="w-5 h-5 mr-2 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h18v18H3V3zm9 2v14m-7-7h14" />
            </svg>
            Orders
          </li>
          <li class="px-4 py-2 text-black flex items-center hover:bg-gray-100 cursor-pointer rounded-b-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" class="size-6 mr-2 text-gray-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5" />
</svg>

            Wishlist
          </li>
        </ul>
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
  