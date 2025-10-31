<template>
    <div class = "mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
        <Link class = "" :href="route('admin.groups.index')">BACK</Link>
    </div>
    <div>
        <div class="mb-4">
            <input v-model ="group.title" class="border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>
        <div class="mb-4">
            <textarea v-model ="group.description" class="border-gray-200 p-4 w-full" type="text" placeholder="body"/>
        </div>
        <div class="rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
            <a href="#" @click.prevent="storeGroup()" class="">STORE</a>
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
            group:{}
        }
    },
    components: {
        Link
    },

    methods: {
        storeGroup(){
            axios.post(route('admin.groups.store'),this.group)
                .then((res) => {
                    this.group = {};
                })
                .catch((e) => {

                })
                .finally(() => {

                })
        }
    },
    props: {
        groups: {
            type: Array,
            required: false,
        },
    },
};
</script>

