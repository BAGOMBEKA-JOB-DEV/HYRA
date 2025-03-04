<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Carousel from '@/Components/Carousel.vue';
import Search from '@/Components/Forms/Search.vue';
import ItemCategories from '@/Components/ItemCategories.vue';
import AccountDropdown from '@/Components/Navbar/AccountDropdown.vue';
import HelpDropdown from '@/Components/Navbar/HelpDropdown.vue';
import TopNavBar from '@/Components/Navbar/TopNavBar.vue';
import Footer from '@/Components/Footer/Footer.vue';
import ProductCarousel from '@/Components/Products/ProductCarousel.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import ProductCards from '@/Components/Products/ProductCards.vue';
import ProductFrames from '@/Components/Products/ProductFrames.vue';
import ProductDisplay from '@/Components/Products/ProductDisplay.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const carouselItems = [
    { image: '/assets/images/h5.jpg' },
    { image: '/assets/images/h1.jpg' },
    { image: '/assets/images/h4.jpg' },
    { image: '/assets/images/h6.jpg' },

];

const mobileMenuOpen = ref(false);

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value;
}
</script>

<template>
 <!-- top most small navbar -->
  <TopNavBar/>
    <Head title="HYRA" />
    <div  class="bg-blue-200 text-black/50 dark:bg-gray-white  dark:text-white/50 min-h-screen 

    ">
        <div class="relative flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-7xl px-6 ">
                <header class="bg-white  flex items-center justify-between xl:lg:mt-4 mt-10 xl:lg:h-auto h-[90px]  shadow-md px-2 rounded-md  
                border-gray-200 dark:border-gray-800">
                    <div class="flex items-center -mt-5 w-[400px]">
                        <ApplicationLogo
                            class="xl:lg:w-[200px] w-[99px]  xl:lg:h-auto h-[80px] rounded-md xl:lg:pl-1 " />
                    </div>
                    <!-- Desktop Nav -->
                    <nav v-if="canLogin" class=" hidden md:flex items-center gap-4 p-5 ">

                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                            dark:hover:text-gray-300">
                        Dashboard
                        </Link>


                        <template v-else>
                            <div class="flex left-0 gap-[25px] mr-[0px] ">

                                <Search class="w-[650px] -mt-5 " />

                                <AccountDropdown/>
                                <HelpDropdown/>


                                <Link :href="route('login')" class="text-sm font-light text-black  hover:text-gray-600 
                               ">
                                Log in
                                </Link>

                                <Link v-if="canRegister" :href="route('register')"
                                    class="text-sm font-light text-black  hover:text-gray-600 ">
                                Register
                                </Link>


                            </div>


                        </template>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button @click="toggleMobileMenu" class="md:hidden focus:outline-none">
                        <svg v-if="!mobileMenuOpen" class="w-6 h-6 text-black border border-gray-400 mr-3 rounded-[3px]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>

                        <svg v-else class="w-5 h-5 text-black mr-3 border border-black rounded-full
                         transition-transform active:rotate-180 duration-500 ease-out " fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </header>

                <!-- Mobile Nav -->
                <div v-if="mobileMenuOpen && canLogin" class="md:hidden flex flex-col  gap-4 py-4 px-4 mt-5
                rounded-md bg-gray-300">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="block text-sm font-medium text-black  hover:text-orange-600 ">
                    Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="route('login')"
                            class="block text-sm font-medium text-black hover:text-orange-600 ">
                        Log in
                        </Link>

                        <Link v-if="canRegister" :href="route('register')"
                            class="block text-sm font-medium text-black hover:text-orange-600 ">
                        Register
                        </Link>
                    </template>
                </div>

                <div class="xl:lg:flex flex-col-3 gap-4 ">
                    <!-- First Column -->
                    <div class="pr-4 pt-4 xl:lg:w-[200px]  ">
                        <ItemCategories />
                    </div>

                    <!-- Second Column -->
                    <div class="  p-4 relative ">
                        <Carousel :items="carouselItems" :interval="3000" class="xl:lg:w-[689px] w-full" />
                    </div>

                    <!-- Third Column -->
                    <div class="pt-4 -ml-4 ">


                        <div class="bg-white p-4 rounded-md shadow-md  space-y-4 border xl:g:w-[300px] w-full ">
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


                        <div class="bg-white p-4 rounded-md shadow-md  space-y-4 border xl:lg:w-[300px] w-full mt-5">
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
           <!-- product carousel -->
           <ProductCarousel/>

<!-- product carousel -->
<ProductCards />

<!-- Product frames -->
 <ProductFrames class="p-6 mt-6 mb-6 bg-white shadow-2xl"/>

 <!-- product display -->
 <ProductDisplay class="mb-6" />

            </div>
        </div>

    </div>

<!-- main footer -->
<Footer/>
</template>

