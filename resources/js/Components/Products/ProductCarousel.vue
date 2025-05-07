<template>
  <div class="max-w-screen-xl mx-auto my-8 shadow-2xl p-5">
    <!-- Header Section -->
    <Timer class="bg-red-flash" />

    <!-- Carousel Container -->
    <div class="relative ">
      <!-- Left Arrow -->
      <button @click="scrollLeft" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow p-2 rounded-full
         z-10 focus:outline-none hover:bg-gray-100">
        <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <!-- Products Wrapper -->
      <div ref="carousel" class="overflow-x-auto p-3 flex gap-4 scroll-smooth snap-x snap-mandatory px-8">
        <!-- Single Product Card -->
        <div v-for="(product, index) in products" :key="index"
          class="min-w-[200px] snap-start bg-white shadow rounded-md p-4 flex-shrink-0 pbb-4">
          <img :src="product.image" :alt="product.name" class="w-full h-32 object-contain mb-2" />
          <h3 class="text-sm text-black font-semibold mb-1 line-clamp-2">
            {{ product.name }}
          </h3>
          <div class="flex items-center space-x-2 mb-2">
            <span class="text-gray-800 font-semibold">
              UGX {{ product.price }}
            </span>
            <span v-if="product.discount" class="text-sm text-orange-500 font-medium line-through">
              -{{ product.discount }}%
            </span>
          </div>
          <div class="text-xs text-gray-500">
            {{ product.sold }} items left
          </div>
        </div>
      </div>

      <!-- Right Arrow -->
      <button @click="scrollRight"
        class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow p-2 rounded-full z-10 focus:outline-none hover:bg-gray-100">
        <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>
  </div>
</template>

<script setup>
import Timer from '@/Components/Products/Timer.vue';
import { ref } from 'vue'

const carousel = ref(null)

const products = ref([
  {
    name: 'STY Men Short Wallets',
    price: 8083,
    discount: 49,
    sold: 34,
    image: '/assets/images/h5.jpg'
  },
  {
    name: 'Stabex Gas Full Set - 13kg',
    price: 290000,
    discount: 0,
    sold: 13,
    image: '/assets/images/h4.jpg'
  },
  {
    name: 'NIVEA Deo Roll On Perfumed Spray',
    price: 16100,
    discount: 10,
    sold: 8,
    image: '/assets/images/h1.jpg'
  },
  {
    name: 'SPJ 3 Gas Burner With Oven',
    price: 406600,
    discount: 55,
    sold: 8,
    image: '/assets/images/h6.jpg'
  },
  {
    name: 'Tecno Pop 8 - 2GB & 64GB',
    price: 700000,
    discount: 0,
    sold: 8,
    image: '/assets/images/h4.jpg'
  },
  {
    name: 'RichPolo Pro3 Bluetooth Earbuds',
    price: 72000,
    discount: 0,
    sold: 8,
    image: '/assets/images/h5.jpg'
  },
])

const scrollLeft = () => {
  if (carousel.value) {
    carousel.value.scrollBy({
      top: 0,
      left: -250,
      behavior: 'smooth'
    })
  }
}

const scrollRight = () => {
  if (carousel.value) {
    carousel.value.scrollBy({
      top: 0,
      left: 250,
      behavior: 'smooth'
    })
  }
}
</script>
