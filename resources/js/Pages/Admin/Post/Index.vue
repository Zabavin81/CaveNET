<template>
    <div>
        <div class="mt-3 rounded-md bg-teal-600 mb-3 inline-block px-3 py-2 text-white hover:bg-teal-400">
            <Link class="" :href="route('admin.posts.create')">CREATE</Link>
        </div>

        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 items-end">
            <input v-model="filter.title" @blur="clearIfEmpty('title')" class="border border-gray-200 p-2 w-full" type="text" placeholder="title">
            <input v-model="filter.body" @blur="clearIfEmpty('body')" class="border border-gray-200 p-2 w-full" type="text" placeholder="body">

            <select class="border border-gray-200 p-2 w-full" v-model.number="filter.category_id">
                <option :value="null" disabled>choose category</option>
                <option v-for="c in categories" :key="c.id" :value="c.id">{{ c.title }}</option>
            </select>

            <input v-model="filter.published_at_from" @blur="clearIfEmpty('published_at_from')" class="border border-gray-200 p-2 w-full" type="date"
                   placeholder="date from">
            <input v-model="filter.published_at_to" @blur="clearIfEmpty('published_at_to')" class="border border-gray-200 p-2 w-full" type="date"
                   placeholder="date to">
            <input v-model.number="filter.views_from" @blur="clearIfEmpty('views_from')" class="border border-gray-200 p-2 w-full" type="number"
                   placeholder="views from">
            <input v-model.number="filter.views_to" @blur="clearIfEmpty('views_to')" class="border border-gray-200 p-2 w-full" type="number"
                   placeholder="views to">
            <div class="flex" v-if="Object.keys(filter).length > 1 || filter.category_id != null">
                <a href="#" class="underline-offset-4 underline text-white" @click.prevent="clearFilters">clear filters</a>
            </div>
        </div>
        <div>
            <div>
                <a class="inline-block mr-2 py-1 px-2 border-gray-200 bg-white text-gray-600" v-for=" link in postsData.meta.links"
                   @click = "filter.page = link.label"
                   href ="#" v-html = "link.label"></a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto divide-gray-200 dark:divide-gray-700">
                <thead>
                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                    <th class="px-3 py-2 whitespace-nowrap">ID</th>
                    <th class="px-3 py-2 whitespace-nowrap">TITLE</th>
                    <th class="px-3 py-2">BODY</th>
                    <th class="px-3 py-2 whitespace-nowrap">ACTION</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                <tr v-for="post in postsData.data" :key="post.id"
                    class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                    <td class="px-3 py-2 whitespace-nowrap">{{ post.id }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">{{ post.title }}</td>
                    <td class="px-3 py-2">{{ post.body }}</td>
                    <td class="px-3 py-2 text-center whitespace-nowrap">
                        <div class="inline-flex cursor-pointer">
                            <Link :href="route('admin.posts.show',post.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </Link>
                        </div>
                        <div class="inline-flex cursor-pointer">
                            <Link :href="route('admin.posts.edit',post.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                                </svg>
                            </Link>
                        </div>
                        <div class="inline-flex cursor-pointer">
                            <a @click.prevent="deletePost(post)" href='#'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                </svg>

                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

export default {
    name: 'Index',
    layout: AdminLayout,
    components: {
        Link,
    },
    props: {
        posts: {
            type: Array,
            required: false,
        },
        categories: {
            type: Array,
            required: false,
        },
    },

    data() {
        return {
            postsData: this.posts,
            filter: {
                category_id: null,
            },
        };
    },
    methods: {
        getPosts() {
            axios.get(route('admin.posts.index'), {
                params: this.filter,
            }).then(res => {
                this.postsData = res.data;
            });
        },
        deletePost(post) {
            axios.delete(route('admin.posts.destroy', post.id))
                .then(res => {
                    this.postsData = this.postsData.filter(postItem => postItem !== post);
                });
        },
        clearFilters() {
            this.filter = {
                category_id: null,
            };
        },

        clearIfEmpty(field) {
            if (this.filter[field] === '') {
                delete this.filter[field];
            }
        },
    },

    watch: {
        filter: {
            handler() {
                this.getPosts();
            },
            deep: true,
        },
    },
};
</script>

