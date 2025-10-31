<template>
    <div class = "mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
        <Link class = "" :href="route('admin.categories.index')">BACK</Link>
    </div>
    <div>
        <div class="mb-4">
            <input v-model ="category.title" class="border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>
        <div class="rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
            <a href="#" @click.prevent="storeCategory()" class="">STORE</a>
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
            category:{}
        }
    },
    components: {
        Link
    },

    methods: {
        storeCategory(){
            axios.post(route('admin.categories.store'),this.category)
                .then((res) => {
                    this.category = {};
                })
                .catch((e) => {

                })
                .finally(() => {

                })
        }
    },
    props: {
        categories: {
            type: Array,
            required: false,
        },
    },
};
</script>

