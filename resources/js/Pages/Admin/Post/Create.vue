<template>
    <div>
        <Link class = "inline-block px-3 py-2 border text-white hover:text-gray-400" :href="route('admin.posts.index')">BACK</Link>
    </div>
    <div>
        <div class="mb-4">
            <input v-model ="post.title" class="border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>
        <div class="mb-4">
            <textarea v-model ="post.body" class="border-gray-200 p-4 w-full" type="text" placeholder="body"/>
        </div>
        <div class="mb-4">
            <a href="#" @click.prevent="storePost()" class="inline-block px-3 py-2 border text-white hover:text-gray-400">STORE</a>
        </div>

    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    layout: AdminLayout,

    data() {
        return{
            post:{}
        }
    },
    components: {
        Link
    },

    methods: {
        storePost(){
            axios.post(route('admin.posts.store'),this.post)
                .then((res) => {
                    this.post = {};
                })
                .catch((e) => {

                })
                .finally(() => {

                })
        }
    },
    props: {
        posts: {
            type: Array,
            required: false,
        },
    },
};
</script>

