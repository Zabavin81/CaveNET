<template>
    <article>
        <div class="group relative grow">
            <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                id: {{group.id}}.      {{group.title }}.
            </h3>
        </div>
        <div>
            <p class = "mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300"> {{group.description}}</p>
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
        Link
    },
    props: {
        group: {
            type: Object,
            required: false,
        },
    },
};
</script>

