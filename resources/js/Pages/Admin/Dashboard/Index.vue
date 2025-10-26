<template>
    <div>
        asodjapsojd
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

