<template>
<div class="w-1/2 p-5 mx-auto text-center ">
  all posts!
    <div>
        <div v-for="post in posts" class="text-left border-2 border-gray-100 bg-white p-3 m-2 font-20 pr-4 pl-4 border-r rounded-xl">
            <h3 class ="text-lg font-bold">{{post.title}}</h3>
            <p class ="text-sm text-gray-600 mb-1">{{post.body}}</p>
                <p class ="">❤️ likes: {{post.likes}}</p>
        </div>

    </div>
</div>
</template>

<script>
export default {
  name: 'Index',

    props: {
      posts: {
          type: Array,
          required: false,
      }
    }
};
</script>

<style scoped>

</style>
