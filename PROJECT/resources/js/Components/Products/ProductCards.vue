<template>
  <div class="  rounded-lg">
    <h2 class="text-2xl font-bold mb-4 text-center text-black">Weekend Deals</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Loop through each deal -->
      <div v-for="deal in deals" :key="deal.id"
        class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
        <img :src="deal.image" :alt="deal.title" class="w-full    rounded-md mb-4" />
        <div class="text-center">
          <h3 class="text-xl font-bold text-black">{{ deal.title }}</h3>
          <div v-for="(spec, index) in deal.specs" :key="index" class="text-gray-600  whitespace-nowrap">
            {{ spec }}
          </div>
          <p class="xl:lg:space-x-20">
            <span class="text-xl font-bold mt-2 text-orange-500 "> {{ deal.price }}</span>
            <span class="text-lg font-bold mt-2 text-orange-300 line-through"> {{ deal.discount }}</span>

          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

// Define our dynamic Skyworth deals
const deals = ref([
  {
    id: 1,
    title: 'Skyworth 43" Smart',
    specs: ['Google Full HD', 'Google TV'],
    price: 'UGX 688,800',
    discount: 'UGX 740,000',
    image: '/assets/images/h4.jpg'
  },
  {
    id: 2,
    title: 'Skyworth 44" Smart',
    specs: ['Google Full HD', 'Google TV'],
    price: 'UGX 436,100',
    discount: 'UGX 500,000',
    image: '/assets/images/h4.jpg'
  },
  {
    id: 3,
    title: 'Skyworth 32" Smart',
    specs: ['Google Full HD', 'Google TV'],
    price: 'UGX 1,059,700',
    discount: 'UGX 1,200,000',
    image: '/assets/images/h4.jpg'
  },

])
</script>