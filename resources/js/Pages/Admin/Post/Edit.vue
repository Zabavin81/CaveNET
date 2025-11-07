<template>
    <div class="mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
        <Link :href="route('admin.posts.index')">BACK</Link>
    </div>

    <div>
        <div class="mb-4">
            <input v-model="form.title" class="border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>

        <div class="mb-4">
            <textarea v-model="form.body" class="border-gray-200 p-4 w-full" placeholder="body"></textarea>
        </div>

        <div class="mb-4">
            <select class="border-gray-200 p-4 w-full" v-model="form.category_id">
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
            form: {
                id: this.post.id,
                title: this.post.title,
                body: this.post.body,
                category_id: this.post.category_id,
                images: [],
            },
        };
    },

    methods: {
        setImages(e) {
            this.form.images = Array.from(e.target.files || []);
        },

        async updatePost() {
            const fd = new FormData();
            fd.append('_method', 'PATCH');
            fd.append('title', this.form.title);
            fd.append('body', this.form.body);
            fd.append('category_id', this.form.category_id);

            this.form.images.forEach((file, i) => {
                fd.append(`images[${i}]`, file);
            });

            const url = route('admin.posts.update', this.form.id);
            await axios.post(url, fd);
            alert('Updated success');
        },
    },
};
</script>
