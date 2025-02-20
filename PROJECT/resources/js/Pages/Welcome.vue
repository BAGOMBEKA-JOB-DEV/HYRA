<script setup>
import Carousel from '@/Components/Carousel.vue';
import ItemCategories from '@/Components/ItemCategories.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const carouselItems = [
    { image: '/assets/images/h2.png' },
    { image: '/assets/images/h1.jpg' },
    { image: '/assets/images/h4.jpg' },

];

const mobileMenuOpen = ref(false);

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value;
}
</script>

<template>

    <Head title="Welcome" />
    <div class="bg-white text-black/50 dark:bg-gray-white  dark:text-white/50 min-h-screen">
        <div class="relative flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-7xl px-6">
                <header class="flex items-center justify-between py-6 border-b 
                border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-12 w-auto text-black dark:text-[#FF2D20]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                        </svg>
                    </div>
                    <!-- Desktop Nav -->
                    <nav v-if="canLogin" class=" hidden md:flex items-center gap-4">

                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                            dark:hover:text-gray-300">
                        Dashboard
                        </Link>


                        <template v-else>
                            <div class="flex left-0 gap-[50px] mr-[100px]">
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                                <Link :href="route('login')" class="text-sm font-light text-black hover:text-black 
                                ">
                                Log in
                                </Link>
                            </div>


                            <Link :href="route('login')" class="text-sm font-light text-black  hover:text-gray-600 
                               ">
                            Log in
                            </Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="text-sm font-light text-black  hover:text-gray-600 ">
                            Register
                            </Link>


                        </template>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button @click="toggleMobileMenu" class="md:hidden focus:outline-none">
                        <svg v-if="!mobileMenuOpen" class="w-6 h-6 text-black " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>

                        <svg v-else class="w-6 h-6 text-black " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </header>

                <!-- Mobile Nav -->
                <div v-if="mobileMenuOpen && canLogin" class="md:hidden flex flex-col gap-4 py-4">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="block text-sm font-medium text-black  hover:text-gray-600 ">
                    Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="route('login')" class="block text-sm font-medium text-black hover:text-gray-600 ">
                        Log in
                        </Link>

                        <Link v-if="canRegister" :href="route('register')"
                            class="block text-sm font-medium text-black dhover:text-gray-600 ">
                        Register
                        </Link>
                    </template>
                </div>

                <div class="flex flex-col-3 gap-4 w-[1000px]">
                    <!-- First Column -->
                    <div class="p-4 w-[200px] ">
                        <ItemCategories />
                    </div>

                    <!-- Second Column -->
                    <div class="  p-4 relative ">
                        <Carousel :items="carouselItems" :interval="3000" class="w-[700px]" />
                    </div>

                    <!-- Third Column -->
                    <div class="pt-4 -ml-4 ">


                        <div class="bg-white p-4 rounded-md shadow-md  space-y-4 border w-[300px] ">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center rounded-full border border-orange-400">
                                    <span class="text-orange-500 text-2xl">?</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-800">HELP CENTER</h3>
                                    <p class="text-xs text-gray-600">Guide To Customer Care</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100">
                                    <span class="text-black text-2xl">🔥</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-800">HOT DEALS</h3>
                                    <p class="text-xs text-gray-600">Be the First to Know!</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center rounded-full border border-orange-400">
                                    <span class="text-orange-500 text-2xl">💸</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-800">SELL ON HYRA</h3>
                                    <p class="text-xs text-gray-600">Millions Of Visitors</p>
                                </div>
                            </div>
                        </div>


                        <div class="bg-white p-4 rounded-md shadow-md  space-y-4 border w-[300px] mt-5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center rounded-full border border-orange-400">
                                    <span class="text-orange-500 text-2xl">🏦</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-800">OFFICES FOR RENT</h3>
                                    <p class="text-xs text-gray-600">Look for Office Buildings near You!</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100">
                                    <span class="text-black text-2xl">💻</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-800">CARS FOR RENT</h3>
                                    <p class="text-xs text-gray-600">Cars for Rent near You!</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 flex items-center justify-center rounded-full border border-orange-400">
                                    <span class="text-orange-500 text-2xl">📡</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-800">LOOKING FOR SERVICES?</h3>
                                    <p class="text-xs text-gray-600">See People Offering Services near You</p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>




                <footer class="py-10 text-center text-sm text-black dark:text-white/70">
                    HYRA @2025
                </footer>
            </div>
        </div>
    </div>
</template>