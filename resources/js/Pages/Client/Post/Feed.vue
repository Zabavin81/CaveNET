<template>
    <div class="bg-gray-900">
        <div class="">
            <div class="">
                <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">
                    Все посты
                </h2>
                <p class="mt-2 text-lg/8 text-gray-300">Laravel + Vue</p>
            </div>

            <div
                class="mx-auto mt-10 max-w-3xl border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16">
                <div class="grid grid-cols-1 gap-y-6">
                    <ItemPost
                        v-for="post in posts"
                        :key="post.id"
                        :post="post"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ClientLayout from '@/Layouts/ClientLayout.vue';
import { Link } from '@inertiajs/vue3';
import ItemPost from '@/Components/Post/ItemPost.vue';

export default {
    name: 'Index',
    components: {Link,
    ItemPost},
    layout: ClientLayout,
    props: {
        posts: {
            type: Array,
            required: true,
        },
    },
};
</script>

