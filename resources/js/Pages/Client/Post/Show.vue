<template>
    <div
        class="mx-auto mt-10 gap-x-8 gap-y-16  border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <div>
            <div class="px-4 py-2 bg-teal-600 mb-4 inline-block rounded-md text-white hover:bg-teal-400">
                <Link :href="route('client.posts.feed')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                    Back
                </Link>
            </div>
            <article class="max-w-xl">
                <div class="flex items-center gap-x-4 text-xs">

                    <time class="text-gray-400">
                        {{ post.published_at }}
                    </time>

                    <a
                        href="#"
                        class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800"
                    >
                        {{ post.category }}
                    </a>
                </div>

                <div class="group relative grow">
                    <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                        {{ post.title }}
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">
                        {{ post.body }}
                    </p>
                </div>
                <div v-if="post.images" class="grid grid-cols-3 gap-2">
                    <img
                        v-for="img in post.images.data"
                        :key="img.id"
                        :src="img.url"
                        :alt="post.title"
                        :title="post.title"
                        class="h-24 w-full object-cover rounded"
                    />
                </div>
                <div @click="toggleLike(post)" class="flex items-center justify-end gap-x-2 text-xs cursor-pointer">
                    <a
                        href="#"
                        class="inline-flex items-center gap-x-1.5 relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                        </svg>
                        {{ post.likes }}
                    </a>
                </div>
            </article>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import ClientLayout from '@/Layouts/ClientLayout.vue';
import axios from 'axios';

export default {
    name: 'Index',
    layout: ClientLayout,
    components: {
        Link,
    },
    props: {
        post: {
            type: Object,
            required: false,
        },
    },
    methods: {
        toggleLike(post) {
            axios.post(route('client.posts.likes.toggle', post.id))
                .then (res=> {
                    console.log(res)
                })
        },
    },
};
</script>

