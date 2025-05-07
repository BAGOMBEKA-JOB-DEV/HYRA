<script>
import { ref, onMounted } from 'vue';

export default {
    setup() {
        const slides = ref([
            {
                title: "3.1 Home Theater System",
                price: "181,700",
                oldPrice: "300,000",
                image: "/assets/images/h3.jpg",
                link: "/shop-now",
            },
            {
                title: "Wireless Bluetooth Speaker",
                price: "250,000",
                oldPrice: "350,000",
                image: "/assets/images/h4.jpg",
                link: "/shop-now",
            },
            {
                title: "Premium Soundbar System",
                price: "400,000",
                oldPrice: "500,000",
                image: "/assets/images/h1.jpg",
                link: "/shop-now",
            },
        ]);

        const currentIndex = ref(0);

        onMounted(() => {
            setInterval(() => {
                currentIndex.value = (currentIndex.value + 1) % slides.value.length;
            }, 4000); // Change every 4 seconds
        });

        return { slides, currentIndex };
    }
};
</script>

<template>
    <div class="relative w-full h-64 md:h-96 overflow-hidden bg-orange-500 rounded-lg">
        <div v-for="(slide, index) in slides" :key="index"
            :class="['absolute inset-0 flex items-center justify-center transition-opacity duration-1000', currentIndex === index ? 'opacity-100' : 'opacity-0']">

            <div class="relative flex items-center w-full h-full px-6 md:px-12">
                <!-- Left Content -->
                <div class="text-white w-1/2">
                    <div class="text-lg md:text-xl font-bold uppercase">OFFICIAL STORE</div>
                    <div class="text-3xl md:text-5xl font-extrabold mt-2">GLOBALSTAR</div>
                    <div class="text-lg md:text-2xl font-semibold">DIGITAL SYSTEM</div>
                    <h2 class="mt-4 text-lg md:text-2xl font-semibold">{{ slide.title }}</h2>
                    <div class="flex items-center mt-2">
                        <span class="bg-white text-black font-bold py-1 px-2 text-sm md:text-lg rounded-l-lg">UGX</span>
                        <span class="bg-white text-black font-bold py-1 px-3 text-xl md:text-3xl rounded-r-lg">{{
                            slide.price }}</span>
                        <span class="ml-3 text-gray-300 line-through text-lg md:text-xl">{{ slide.oldPrice }}</span>
                    </div>
                    <p class="text-xs mt-2 opacity-75">T&Cs Apply</p>
                </div>

                <!-- Right Image -->
                <div class="w-1/2 flex justify-end mt-10">
                    <img :src="slide.image" alt="product image"
                        class="h-auto max-h-52 md:max-h-80  rounded-tr-[100px] rounded-bl-[100px]">
                </div>
            </div>
        </div>

        <!-- Top Purple Banner -->
        <div class="absolute top-0 left-0 w-full bg-purple-700 text-white text-center text-sm md:text-base py-2">
            Kiss-Worthy Deals, Just for You!
        </div>

        <!-- Bottom Indicator -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <span v-for="(slide, index) in slides" :key="index"
                :class="['w-3 h-3 rounded-full transition-all', currentIndex === index ? 'bg-black' : 'bg-gray-300']">
            </span>
        </div>

        <!-- Shop Now Button -->
        <a :href="slides[currentIndex].link"
            class="absolute bottom-4 right-4 bg-white text-black text-[12px] hover:text-orange-500 font-semibold px-4 py-2 rounded-lg shadow-lg">
            SHOP NOW &gt;
        </a>
    </div>
</template>
