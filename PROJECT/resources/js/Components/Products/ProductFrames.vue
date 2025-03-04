<script>
import { ref, onMounted } from 'vue';

export default {
  setup() {
    const categories = ref([
      { name: 'Computing', images: ['/assets/images/h1.jpg', '/assets/images/h3.jpg', '/assets/images/h4.jpg'], link: '/computing' },
      { name: 'Phones', images: ['/assets/images/h6.jpg', '/assets/images/h5.jpg', '/assets/images/h3.jpg'], link: '/phones' },
      { name: 'China Mall', images: ['/assets/images/h5.jpg', '/assets/images/h1.jpg', '/assets/images/h3.jpg'], link: '/china-mall' },
      { name: 'New Arrivals', images: ['/assets/images/h3.jpg', '/assets/images/h4.jpg', '/assets/images/h6.jpg'], link: '/new-arrivals' },
      { name: 'Televisions', images: ['/assets/images/h5.jpg', '/assets/images/h6.jpg', '/assets/images/h4.jpg'], link: '/televisions' },
      { name: 'Appliances', images: ['/assets/images/h3.jpg', '/assets/images/h1.jpg', '/assets/images/h6.jpg'], link: '/appliances' },
      { name: 'Super Saver Sale', images: ['/assets/images/h5.jpg', '/assets/images/h6.jpg', '/assets/images/h3.jpg'], link: '/super-saver-sale' },
      { name: 'Shipped from Abroad', images: ['/assets/images/h4.jpg', '/assets/images/h5.jpg', '/assets/images/h1.jpg'], link: '/shipped-from-abroad' },
      { name: 'Make Extra Cash', images: ['/assets/images/h6.jpg', '/assets/images/h4.jpg', '/assets/images/h1.jpg'], link: '/make-extra-cash' },
      { name: 'Jumia Picks', images: ['/assets/images/h5.jpg', '/assets/images/h6.jpg', '/assets/images/h3.jpg'], link: '/jumia-picks' },
    ]);

    const currentIndexes = ref(Array(categories.value.length).fill(0));

    onMounted(() => {
      categories.value.forEach((_, index) => {
        setInterval(() => {
          currentIndexes.value[index] = (currentIndexes.value[index] + 1) % categories.value[index].images.length;
        }, 3000 + index * 500); // Different intervals for each image
      });
    });

    return { categories, currentIndexes };
  }
};
</script>

<template>
  <div class="grid xl:lg:grid-cols-5 sm:grid-cols-2 gap-4 rounded-lg">
    <a v-for="(category, index) in categories" :key="index" :href="category.link" class="relative h-40 rounded-lg overflow-hidden block">
      <div v-for="(image, imgIndex) in category.images" :key="imgIndex" :class="[
        'absolute inset-0 w-full h-full object-cover transition-opacity duration-1000',
        currentIndexes[index] === imgIndex ? 'opacity-100' : 'opacity-0'
      ]" :style="{ backgroundImage: `url(${image})`, backgroundSize: 'cover', backgroundPosition: 'center' }">
      </div>
      <div
        class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center text-white text-lg font-semibold">
        {{ category.name }}
      </div>
    </a>
  </div>
</template>
