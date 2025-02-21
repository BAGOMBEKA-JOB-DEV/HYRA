<template>

  <!-- Main Categories Sidebar -->
  <div class="xl:lg:w-[200px] xl:lg:block hidden bg-white shadow-2xl  p-2">
    <ul>
      <li v-for="category in categories" :key="category.id" @mouseenter="showSubMenu(category, $event)"
        @mouseleave="scheduleHideSubMenu" class="p-4 hover:text-orange-500 cursor-pointer text-gray-800">
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
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },
  {
    id: 1,
    name: 'Phones & Tablets',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },
  {
    id: 1,
    name: 'Phones & Tablets',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },
  {
    id: 1,
    name: 'Phones & Tablets',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },
  {
    id: 1,
    name: 'Phones & Tablets',
    subCategories: [
      { title: 'Mobile Phones', items: ['Smartphones', 'Android Phones', 'iPhones', 'Feature Phones'] },
      { title: 'Accessories', items: ['Smart Watches', 'Chargers', 'Headsets', 'Power Banks'] },
      { title: 'Brands', items: ['Samsung', 'Tecno', 'Apple', 'Infinix'] },
    ],
  },

  { id: 2, name: 'TVs & Audio', subCategories: [{ title: 'Televisions', items: ['Smart TVs', 'OLED TVs'] }] },
  { id: 3, name: 'Appliances', subCategories: [{ title: 'Kitchen', items: ['Microwaves', 'Refrigerators'] }] },
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