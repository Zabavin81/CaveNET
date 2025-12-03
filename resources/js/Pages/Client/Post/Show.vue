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
                <ItemPost :post="post"></ItemPost>
            </article>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import ClientLayout from '@/Layouts/ClientLayout.vue';
import axios from 'axios';
import ItemPost from '@/Components/Post/ItemPost.vue';

export default {
    name: 'Index',
    layout: ClientLayout,
    components: {
        Link,
        ItemPost,
    },
    props: {
        post: {
            type: Object,
            required: false,
        },
    },
    methods: {
        toggleLike() {
            axios.post(route('client.posts.likes.toggle', this.post.id))
                .then (res=> {
                    this.post.is_liked = res.data.is_liked
                    this.post.liked_by_profiles_count = res.data.liked_by_profiles_count
                })
        },
    },
};
</script>

