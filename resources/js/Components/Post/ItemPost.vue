<template>
  <article
      class="flex flex-col gap-4 rounded-xl border border-gray-700 bg-gray-900/60 p-4 shadow-sm transition hover:border-teal-500 hover:bg-gray-900"
  >
    <div class="flex items-center justify-between gap-4 text-xs">
      <time class="text-gray-400">
        {{ post.published_at }}
      </time>

      <span
          class="inline-flex items-center rounded-full bg-gray-800/80 px-3 py-1.5 font-medium text-gray-300 text-[11px] uppercase tracking-wide"
      >
        {{ post.category }}
      </span>
    </div>

    <div class="group">
      <h3 class="mt-1 text-lg/6 font-semibold text-white group-hover:text-gray-300">
        <Link v-if="!route().current('client.posts.show')" :href="route('client.posts.show',post)">
        {{ post.title }}
        </Link>
        <span v-else>{{post.title}}</span>
      </h3>
      <p class="mt-3 text-sm/6 text-gray-400 line-clamp-3">
        {{ post.body }}
      </p>
    </div>

    <!-- Картинки -->
    <div v-if="post.images && post.images.data?.length" class="grid grid-cols-3 gap-2">
      <img
          v-for="img in post.images.data"
          :key="img.id"
          :src="img.url"
          :alt="post.title"
          :title="post.title"
          class="h-24 w-full rounded object-cover"
      />
    </div>

    <!-- Лайки -->
    <div class="mt-2 flex items-center justify-end">
      <button
          type="button"
          @click="toggleLike"
          class="inline-flex items-center gap-x-1.5 rounded-full bg-gray-800/60 px-3 py-1.5 text-xs font-medium text-gray-300 hover:bg-gray-800 focus:outline-none"
      >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            :fill="post.is_liked ? '#fff' : 'none'"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-5"
        >
          <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
          />
        </svg>
        <span>{{ post.liked_by_profiles_count }}</span>
      </button>
    </div>
  </article>
</template>

<script>
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

export default {
  name: 'ItemPost',
  components:{
    Link,
  },

  props: {
    post: {
      required: true,
      type: Object,
    },
  },

  methods: {
    toggleLike() {
      axios
          .post(route('client.posts.likes.toggle', this.post.id))
          .then((res) => {
            this.post.is_liked = res.data.is_liked;
            this.post.liked_by_profiles_count = res.data.liked_by_profiles_count;
          });
    },
  },
};
</script>

<style scoped>
</style>
