<template>
  <div class="w-1/2 p-5 mx-auto text-center ">
    all groups!
    <div>
      <div v-for="group in groups"
           class="text-left border-2 border-gray-100 bg-white p-3 m-2 font-20 pr-4 pl-4 border-r rounded-xl">
        <h3 class="text-lg font-bold">{{ group.title }}</h3>
        <p class="text-sm text-gray-600 mb-1">{{ group.description }}</p>
      </div>

    </div>
  </div>
</template>>

<script>
export default {
  name: "Index",

  props:{
  groups: {
    type : Array,
    required: false,
  },
}

}
</script>

<style scoped>

</style>
<script setup lang="ts">
</script>
