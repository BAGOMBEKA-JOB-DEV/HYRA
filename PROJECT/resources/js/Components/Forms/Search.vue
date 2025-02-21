<template>
    <div class="flex items-center  p-4">
        <input v-model="query" type="text"
            class=" border-gray-500 focus:outline-none  text-black font-light  rounded-l-md w-full"
            placeholder="Search Categories, brands, and products" />
        <button @click="handleSearch"
            class="bg-orange-500 text-white px-4 py-2 rounded-r-md ml-2 hover:bg-orange-600 focus:outline-none">
            Search
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            query: '',
            filteredData: [],
        };
    },
    methods: {
        handleSearch() {
            const content = this.$parent.items || [];  // Get the items from the parent component
            if (this.query === '') {
                this.filteredData = content;  // If query is empty, show all data
            } else {
                this.filteredData = content.filter(item =>
                    item.toLowerCase().includes(this.query.toLowerCase())  // Adjust filter based on how the data is structured
                );
            }
            this.$parent.filteredItems = this.filteredData;  // Update the parent component with filtered results
        },
    },
};
</script>