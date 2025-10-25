<template>
  <div class="w-1/2 p-5 mx-auto text-center ">
    all categories!
    <div>
      <div v-for="category in categories"
           class="text-left border-2 border-gray-100 bg-white p-3 m-2 font-20 pr-4 pl-4 border-r rounded-xl">
        <h3 class="text-lg font-bold">{{ category.title }}</h3>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: 'Index',
  props: {
    categories: {
      type: Array,
      required: false,
    },
  },
};
</script>

<style scoped>

</style>
