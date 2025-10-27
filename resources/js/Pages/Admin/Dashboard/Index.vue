<template>
    <div class="text-center">
        <h1 class="text-gray-900 text-9xl dark:text-white">DASHBOARD</h1>
    </div>
</template>
<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default {
    name: 'Index',
    layout:AdminLayout,
    props: {
        posts: {
            type: Array,
            required: false,
        },
    },
};
</script>

