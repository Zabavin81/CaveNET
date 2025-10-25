<template>
  <div class="w-1/2 p-5 mx-auto text-center ">
    all profiles !
    <div>
      <div v-for="profile in profiles"
           class="text-left border-2 border-gray-100 bg-white p-3 m-2 font-20 pr-4 pl-4 border-r rounded-xl">
        <h3 class="text-lg font-bold">username: {{profile.username }}</h3>
        <h3 class="text-lg font-bold">name: {{profile.name }}</h3>
        <h3 class="text-lg font-bold">gender: {{profile.gender}}</h3>
        <h3 class="text-lg font-bold">from: {{profile.country }}</h3>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: "Index",
  props: {
    profiles: {
      type: Array,
      required: false,
    },
  },

}
</script>

<style scoped>

</style>
