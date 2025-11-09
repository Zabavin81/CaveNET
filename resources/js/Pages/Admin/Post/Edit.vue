<template>
    <div class="mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
        <Link :href="route('admin.posts.index')">BACK</Link>
    </div>

    <div>
        <div class="mb-4">
            <input v-model="entries.post.title" class="border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>

        <div class="mb-4">
            <textarea v-model="entries.post.body" class="border-gray-200 p-4 w-full" placeholder="body"></textarea>
        </div>

        <div class="mb-4">
            <select class="border-gray-200 p-4 w-full" v-model="entries.post.category_id">
                <option :value="null" disabled>Выберите категорию</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.title }}
                </option>
            </select>
        </div>

        <div class="mb-4">
            <input multiple ref="image_input" accept="image/*" @change="setImages"
                   class="border-gray-200 w-full text-teal-600" type="file">
        </div>

        <div class="rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
            <a href="#" @click.prevent="updatePost">UPDATE</a>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    layout: AdminLayout,

    props: {
        categories: { type: Array, required: true },
        post: { type: Object, required: true },
    },

    components: { Link },

    data() {

        return {
            entries: {
                post: this.post,
                _method: 'PATCH',
            },
        };
    },

    methods: {
        setImages(e) {
            this.entries.images = e.target.files;
        },

        updatePost() {
            axios.post(route('admin.posts.update', { post: this.post.id }), this.entries, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then((res) => {
                    alert('EDITED SUCCESSFULLY');
                });
        },
    },
};
</script>
