<template>
    <div
        class="mx-auto mt-10 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <div>
            <article class="max-w-xl">
                <div class="flex items-center gap-x-4 text-xs">
                    <time class="text-gray-400">
                        {{ post.published_at }}
                    </time>

                    <a
                        href="#"
                        class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800"
                    >
                        {{post.category}}
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
            </article>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    layout: AdminLayout,
    components: {
        Link
    },
    props: {
        post: {
            type: Object,
            required: false,
        },
    },
};
</script>

