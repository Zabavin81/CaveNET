<template>

    <section>
        <header>
            header

        </header>
    </section>
    <section class="min-h-screen">
        <aside
            class="fixed left-0 top-16 bottom-0 w-1/6 py-4 bg-gray-800 text-white overflow-y-auto"
        >
            <div class="flex flex-col">
                <Link :href="route('admin.dashboard')" :class ="[$page.url.startsWith('/admin/dashboard') ? 'bg-teal-600 text-white' : '','p-2 text-teal-600 border-b']">Dashboard</Link>
                <Link :href="route('admin.posts.index')" :class ="[$page.url.startsWith('/admin/posts') ? 'bg-teal-600 text-white' : '','p-2 text-teal-600 border-b']">Posts</Link>
                <Link :href="route('admin.categories.index')" :class ="[$page.url.startsWith('/admin/categories') ? 'bg-teal-600 text-white' : '','p-2 text-teal-600 border-b']">Categories</Link>
                <Link :href="route('admin.profiles.index')" :class ="[$page.url.startsWith('/admin/profiles') ? 'bg-teal-600 text-white' : '','p-2 text-teal-600 border-b']">Profiles</Link>
                <Link :href="route('admin.groups.index')" :class ="[$page.url.startsWith('/admin/groups') ? 'bg-teal-600 text-white' : '','p-2 text-teal-600 border-b']">Groups</Link>
            </div>
        </aside>

        <article class="w-5/6 ml-[16.6667%] pt-16 p-4">
            <slot />
        </article>
    </section>

    <section>
        <footer>
        </footer>
    </section>
</template>
<script>

import { Link } from '@inertiajs/vue3'
import NavLink from '@/Components/NavLink.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
export default {
    name: 'AdminLayout',
    components: { DropdownLink, NavLink,Link},
};
</script>


<style scoped>

</style>
