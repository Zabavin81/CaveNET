<template>

    <section class = "fixed w-full flex bg-gray-950 justify-end z-50">
        <header class="w-5/6">
            <div class="mx-auto flex h-16 max-w-7xl items-center gap-8 px-4 sm:px-6 lg:px-8 p-4">
                <a class="block text-teal-600 dark:text-teal-300" href="#">
                    <span class="sr-only">Home</span>
                    Tomato
                </a>

                <div class="flex flex-1 items-center justify-end md:justify-between">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                    About
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                    Careers
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                    History
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                    Services
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                    Projects
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="flex items-center gap-4">
                        <div class="sm:flex sm:gap-4">
                            <a class="block rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700 dark:hover:bg-teal-500" href="#">
                                Login
                            </a>

                            <a class="hidden rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 sm:block dark:bg-gray-800 dark:text-white dark:hover:text-white/75" href="#">
                                Register
                            </a>
                        </div>

                        <button class="block rounded-sm bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden dark:bg-gray-800 dark:text-white dark:hover:text-white/75">
                            <span class="sr-only">Toggle menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>
    </section>
    <section class="min-h-screen">
        <aside
            class="fixed left-0 top-16 bottom-0 w-1/6 p-4 bg-gray-800 text-white overflow-y-auto z-10"
        >
            <div>
                <DropdownLink :href="route('admin.dashboard')" class = "text-teal-600 border-b ">Dashboard</DropdownLink>
                <DropdownLink :href="route('admin.posts.index')" class = "text-teal-600 border-b">Posts</DropdownLink>
                <DropdownLink :href="route('admin.categories.index')" class = "text-teal-600 border-b">Categories</DropdownLink>
                <DropdownLink :href="route('admin.profiles.index')" class = "text-teal-600 border-b">Profiles</DropdownLink>
                <DropdownLink :href="route('admin.groups.index')" class = "text-teal-600 border-b">Groups</DropdownLink>
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
