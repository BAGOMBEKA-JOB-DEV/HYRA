<template>
  <!-- Main Categories Sidebar -->
  <div class="xl:lg:w-[200px] xl:lg:block hidden bg-white shadow-2xl text-sm p-2 pt-6 pb-4">
    <ul>
      <li v-for="category in categories" :key="category.id" @mouseenter="showSubMenu(category, $event)"
        @mouseleave="scheduleHideSubMenu" class="p-2 hover:text-orange-500 cursor-pointer text-gray-800 
        flex items-center">
        <span class="mr-2" v-html="category.icon"></span>
        {{ category.name }}
      </li>
    </ul>
  </div>

  <!-- Subcategories Modal (Teleported to body) -->
  <Teleport to="body">
    <div v-if="activeCategory" class="absolute bg-white border shadow-lg w-[700px] p-6 z-50"
      :style="{ top: modalPosition.top, left: modalPosition.left }" @mouseenter="cancelHideSubMenu"
      @mouseleave="hideSubMenu">
      <h2 class="font-semibold text-lg mb-4">{{ activeCategory.name }}</h2>
      <div class="grid grid-cols-3 gap-4 text-sm text-gray-700">
        <div v-for="(group, index) in activeCategory.subCategories" :key="index">
          <h3 class="font-medium mb-2">{{ group.title }}</h3>
          <ul>
            <li v-for="item in group.items" :key="item" class="mb-1 hover:text-orange-500 cursor-pointer">
              {{ item }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </Teleport>
</template>

<script setup>
import { ref } from 'vue';

const activeCategory = ref(null);
const modalPosition = ref({ top: '0px', left: '0px' });
let hideTimeout = null;

const categories = [
  {
    id: 1,
    name: 'Phones & Tablets',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 "> <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },
  {
    id: 2,
    name: 'TVs & Audio',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125Z" /></svg>',
    subCategories: [{ title: 'Televisions', items: ['Smart TVs', 'OLED TVs'] }],
  },
  {
    id: 3,
    name: 'Appliances',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" /></svg>',
    subCategories: [{ title: 'Kitchen', items: ['Microwaves', 'Refrigerators'] }],
  },

  {
    id: 1,
    name: 'Computing',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },

  {
    id: 1,
    name: 'Home ',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },

  {
    id: 1,
    name: 'Fashion ',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },

  {
    id: 1,
    name: 'Super Market ',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },

  {
    id: 1,
    name: 'Health & Beauty',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },

  {
    id: 1,
    name: 'Offical Stores',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },



  {
    id: 1,
    name: 'Other Categories',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },

];

const showSubMenu = (category, event) => {
  cancelHideSubMenu();
  activeCategory.value = category;
  const rect = event.target.getBoundingClientRect();
  modalPosition.value = {
    top: `${rect.top}px`,
    left: `${rect.right + 10}px`,
  };
};

const scheduleHideSubMenu = () => {
  hideTimeout = setTimeout(() => {
    activeCategory.value = null;
  }, 200);
};

const hideSubMenu = () => {
  activeCategory.value = null;
};

const cancelHideSubMenu = () => {
  if (hideTimeout) clearTimeout(hideTimeout);
};
</script>
