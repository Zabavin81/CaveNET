<template>
    <article>
        <div class="group relative grow">
            <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                id: {{category.id}}.      {{ category.title }}
            </h3>
        </div>
    </article>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    layout: AdminLayout,
    components: {
        Link,
    },
    props: {
        category: {
            type: Object,
            required: false,
        },
    },
};
</script>

