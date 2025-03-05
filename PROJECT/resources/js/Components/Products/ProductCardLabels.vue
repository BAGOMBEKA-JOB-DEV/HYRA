<template>
    <div class="">
        <!-- Header Banner -->
        <div class="bg-purple-700 text-white text-center p-3 text-lg font-semibold rounded-t-lg">
            Gifts & Deals Made for Love!
        </div>

        <!-- Grid Section -->
        <div
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 p-4 bg-gray-100 rounded-b-lg border border-purple-700">
            <div v-for="(item, index) in categories" :key="index" class="relative group">
                <a :href="item.link">
                    <img :src="item.image" :alt="item.title"
                        class="w-full h-48 object-cover rounded-lg hover:w-[700px]" />
                    <button class="absolute  bottom-2 left-2 right-2 bg-white text-black font-bold  hover:animate-wiggle
          text-center p-2 rounded-md shadow-2xl hover:text-white hover:bg-orange-500 ">
                        {{ item.title }}
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
const categories = [
    { title: "Samsung Phones", image: "/assets/images/h4.jpg", link: '/samsung-phones' },
    { title: "50+ size Tvs", image: "/assets/images/h6.jpg", link: '/tvs' },
    { title: "Printers", image: "/assets/images/h5.jpg", link: '/printers' },
    { title: "Blenders", image: "/assets/images/h1.jpg", link: '/blenders' },
    { title: "Kitchen & Dining", image: "/assets/images/h3.jpg", link: '/kitchen_and_dining' },
    { title: "Perfumes", image: "/assets/images/h6.jpg", link: '/perfumes' },
    { title: "Earbuds", image: "/assets/images/h1.jpg", link: '/earburds' },
    { title: "Home Audio", image: "/assets/images/h4.jpg", link: '/home_studio' },
    { title: "Laptops", image: "/assets/images/h3.jpg", link: '/laptops' },
    { title: "Fridges", image: "/assets/images/h5.jpg", link: '/fridges' },
];
</script>

