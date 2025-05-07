<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
      <!-- Cart Empty Message -->
      <div class="flex flex-col items-center bg-white p-8 rounded-lg shadow-lg">
        <!-- Cart Icon -->
        <div class="mb-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="h-16 w-16 text-yellow-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M3 3h18l-1.5 9h-15L3 3zm1 2l.8 4.8h13.6L20 5M4 18c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2M4 18h16"
            />
          </svg>
        </div>
        <!-- Cart Message -->
        <h2 class="text-xl font-semibold text-gray-700 mb-2">Your cart is empty!</h2>
        <p class="text-gray-500 mb-6 text-center">
          Browse our categories and discover our best deals!
        </p>
        <!-- Start Shopping Button -->
        <button class="bg-orange-500 text-white py-2 px-6 rounded-lg hover:bg-orange-400 transition duration-300">
          Start Shopping
        </button>
      </div>
    </div>
  </template>
  
  <script setup>
  // This is where your Vue logic can go. For now, it's just a static component.
  </script>
  
  <style scoped>
  /* Additional scoped styling can go here if needed */
  </style>
  