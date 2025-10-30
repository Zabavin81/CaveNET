<template>
    <div class = "mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
        <Link class=""
              :href="route('admin.profiles.index')">BACK
        </Link>
    </div>
    <div>
        <div class="mb-4">
            <input v-model="profile.username" class="border-gray-200 p-4 w-full" type="text" placeholder="username">
        </div>
        <div class="mb-4">
            <textarea v-model="profile.name" class="border-gray-200 p-4 w-full" type="text" placeholder="name"/>
        </div>
        <div class="mb-4">
            <textarea v-model="profile.gender" class="border-gray-200 p-4 w-full" type="text" placeholder="gender"/>
        </div>
        <div class="mb-4">
            <textarea v-model="profile.country" class="border-gray-200 p-4 w-full" type="text" placeholder="country"/>
        </div>
        <div class="mb-4">
            <input v-model="profile.date_of_birth" class="border-gray-200 p-4 w-full" type="date"
                      placeholder="date of birth"/>
        </div>
        <div class = "mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
            <a href="#" @click.prevent="storeProfile()"
               class="">STORE</a>
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
        Link,
    },
    data() {
        return {
            profile: {},
        };
    },
    props: {
        profiles: {
            type: Array,
            required: false,
        },
    },
    methods: {
        storeProfile() {
            axios.post(route('admin.profiles.store'), this.profile)
                .then((res) => {
                    this.profile = {}
                });

        },
    },
};
</script>

