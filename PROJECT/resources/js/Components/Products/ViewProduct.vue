<template>
    <div class="bg-gray-100 min-h-screen p-6">
      <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-4">{{ breadcrumb }}</nav>
  
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Product Image -->
          <div class="col-span-1">
            <img :src="product.image" :alt="product.name" class="w-full rounded-md" />
          </div>
  
          <!-- Product Details -->
          <div class="col-span-2 space-y-4">
            <h1 class="text-2xl font-bold text-gray-900">{{ product.name }}</h1>
            <div class="text-red-500 text-xl font-bold">UGX {{ product.price }}</div>
            <div class="text-gray-500 text-sm line-through">UGX {{ product.oldPrice }}</div>
  
            <div @click="addToCart" class="bg-orange-500 text-white font-semibold px-4 py-2 rounded-md w-max cursor-pointer hover:bg-orange-600">
              Add to Cart
            </div>
  
            <div class="text-gray-700">
              <strong>Key Features:</strong>
              <ul class="list-disc pl-5 mt-1">
                <li v-for="feature in product.features" :key="feature">{{ feature }}</li>
              </ul>
            </div>
          </div>
        </div>
  
        <!-- Sponsored Products -->
        <div class="mt-8">
          <h2 class="text-lg font-bold text-gray-900">Sponsored Products</h2>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-3">
            <div v-for="sponsored in sponsoredProducts" :key="sponsored.id" class="bg-gray-50 p-3 rounded-md shadow-sm">
              <img :src="sponsored.image" :alt="sponsored.name" class="w-full rounded-md mb-2" />
              <p class="text-sm font-semibold text-gray-900">{{ sponsored.name }}</p>
              <p class="text-red-500 font-bold text-sm">UGX {{ sponsored.price }}</p>
            </div>
          </div>
        </div>
  
        <!-- Product Description -->
        <div class="mt-8">
          <h2 class="text-lg font-bold text-gray-900">Product Details</h2>
          <p class="text-gray-700 mt-2">{{ product.description }}</p>
        </div>
  
        <!-- Specifications -->
        <div class="mt-6">
          <h2 class="text-lg font-bold text-gray-900">Specifications</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
            <div class="bg-gray-50 p-4 rounded-md shadow-sm">
              <h3 class="font-semibold">Key Features</h3>
              <ul class="list-disc pl-5 text-sm text-gray-700">
                <li v-for="feature in product.features" :key="feature">{{ feature }}</li>
              </ul>
            </div>
            <div class="bg-gray-50 p-4 rounded-md shadow-sm">
              <h3 class="font-semibold">What's in the Box</h3>
              <p class="text-sm text-gray-700">{{ product.boxContents }}</p>
            </div>
          </div>
        </div>
  
        <!-- Sidebar (Delivery & Payment) -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="md:col-span-2"></div>
          <div class="bg-gray-50 p-4 rounded-md shadow-sm">
            <h3 class="font-bold text-gray-900">Delivery & Payment</h3>
            <p class="text-gray-700 text-sm mt-1">{{ delivery }}</p>
            <p class="text-gray-700 text-sm mt-1">{{ payment }}</p>
            <button @click="buyNow" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-md w-full hover:bg-orange-600">
              Buy Now
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  
  const breadcrumb = ref("Home > Computing > Laptops > HP > HP 14 Intel Celeron Laptop");
  
  const product = ref({
    name: "HP 14 Intel Celeron 4GB RAM 256GB SSD 14-inch Laptop - Silver",
    image: "/assets/images/h6.jpg",
    price: 819500,
    oldPrice: 920000,
    features: ["Intel Celeron Processor", "4GB RAM, 256GB SSD", "14-inch HD Display", "Windows 10", "Silver Color"],
    description: "This laptop is ideal for both work and play. It features an Intel Celeron processor, a 14-inch HD screen, 4GB of RAM, and a 256GB SSD for fast performance. It is lightweight and comes in a sleek silver color.",
    boxContents: "Laptop, Charger, User Manual"
  });
  
  const sponsoredProducts = ref([
    {
      id: 1,
      name: "HP Laptop 15.6\"",
      price: 1200000,
      image: "/assets/images/h6.jpg"
    },
    {
      id: 2,
      name: "Dell Inspiron 14",
      price: 950000,
      image: "/assets/images/h6.jpg"
    }
  ]);
  
  const delivery = ref("Delivered in 2-5 business days");
  const payment = ref("Pay on delivery available");
  
  const addToCart = () => {
    alert(`Added ${product.value.name} to cart!`);
  };
  
  const buyNow = () => {
    alert(`Proceeding to buy: ${product.value.name}`);
  };
  </script>
  