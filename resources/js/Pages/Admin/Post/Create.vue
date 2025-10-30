<template>
    <div class = "mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
        <Link class = "" :href="route('admin.posts.index')">BACK</Link>
    </div>
    <div>
        <div class="mb-4">
            <input v-model ="post.title" class="border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>
        <div class="mb-4">
            <textarea v-model ="post.body" class="border-gray-200 p-4 w-full" type="text" placeholder="body"/>
        </div>
        <div class="rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
            <a href="#" @click.prevent="storePost()" class="">STORE</a>
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

