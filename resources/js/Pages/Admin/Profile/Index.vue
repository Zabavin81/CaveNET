<template>
    <div>
        <table class="divide-gray-200 dark:divide-gray-700 ">
            <thead>
            <tr class="*:font-medium *:text-gray-900 dark:*:text-white ">
                <th class="px-3 py-2">ID</th>
                <th class="px-3 py-2">USERNAME</th>
                <th class="px-3 py-2">NAME</th>
                <th class="px-3 py-2">GENDER</th>
                <th class="px-3 py-2">COUNTRY</th>
                <th class="px-3 py-2">DATE OF BIRTH</th>
                <th class="px-3 py-2">MATERIAL STATUS</th>
                <th class="px-3 py-2">ACTION</th>
            </tr>
            </thead>

            <tbody v-for="profile in profiles" class="divide-y divide-gray-200 dark:divide-gray-700">
            <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                <td class="px-3 py-2">{{profile.id}}</td>
                <td class="px-3 py-2">{{profile.username}}</td>
                <td class="px-3 py-2">{{profile.name}}</td>
                <td class="px-3 py-2">{{profile.gender}}</td>
                <td class="px-3 py-2">{{profile.country}}</td>
                <td class="px-3 py-2">{{profile.date_of_birth}}</td>
                <td class="px-3 py-2">{{profile.material_status}}</td>
                <td class="px-3 py-2 text-center">
                    <div class ="inline-flex cursor-pointer">
                        <Link :href="route('admin.profile.show',profile.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        </Link>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    layout: AdminLayout,
    components: {
        Link
    },
    props: {
        profiles: {
            type: Array,
            required: false,
        },
    },
};
</script>

