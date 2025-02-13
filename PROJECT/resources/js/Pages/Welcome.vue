<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const mobileMenuOpen = ref(false);

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value;
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen">
        <div class="relative flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-7xl px-6">
                <header class="flex items-center justify-between py-6 border-b 
                border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="h-12 w-auto text-black dark:text-[#FF2D20]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                        </svg>
                    </div>

                    <!-- Desktop Nav -->
                    <nav v-if="canLogin" class="hidden md:flex items-center gap-4">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                            dark:hover:text-gray-300">
                            Dashboard
                        </Link>

                        
                        <template v-else>
                            <div class="flex left-0 gap-[50px] mr-[100px]">
                                <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                                <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>
                            </div>

                            
                            <Link :href="route('login')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 
                                dark:hover:text-gray-300">
                                Log in
                            </Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="text-sm font-medium text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300">
                                Register
                            </Link>
                        </template>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button @click="toggleMobileMenu" class="md:hidden focus:outline-none">
                        <svg v-if="!mobileMenuOpen" class="w-6 h-6 text-black dark:text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>

                        <svg v-else class="w-6 h-6 text-black dark:text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </header>

                <!-- Mobile Nav -->
                <div v-if="mobileMenuOpen && canLogin" class="md:hidden flex flex-col gap-4 py-4">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="block text-sm font-medium text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300">
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="route('login')"
                            class="block text-sm font-medium text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300">
                            Log in
                        </Link>

                        <Link v-if="canRegister" :href="route('register')"
                            class="block text-sm font-medium text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300">
                            Register
                        </Link>
                    </template>
                </div>

                <footer class="py-10 text-center text-sm text-black dark:text-white/70">
                    HYRA @2025
                </footer>
            </div>
        </div>
    </div>
</template>