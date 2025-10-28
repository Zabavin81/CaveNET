<template>
    <div
        class="mx-auto mt-10 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none"
    >
        <article class="max-w-xl">
            <!-- верхняя строка: дата рождения + чип с полом -->
            <div class="flex items-center gap-x-4 text-xs">
                <time class="text-gray-400" :datetime="profile.date_of_birth">
                    date of birth: {{ profile.date_of_birth }}
                </time>

                <span
                    class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300"
                >
          {{ profile.gender }}
        </span>
            </div>

            <!-- заголовок -->
            <div class="group relative grow">
                <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                    {{ displayName }}
                </h3>

                <!-- «тело» карточки: ключевые поля -->
                <p class="mt-5 text-sm/6 text-gray-400">
                    <span class="block"><span class="text-gray-500">ID:</span> {{ profile.id }}</span>
                    <span class="block"><span class="text-gray-500">Username:</span> {{ profile.username }}</span>
                    <span class="block"><span class="text-gray-500">Country:</span> {{ profile.country }}</span>
                    <span class="block"><span class="text-gray-500">Marital status:</span> {{ profile.material_status }}</span>
                </p>
            </div>
        </article>
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
        profile: {
            type: Object,
            required: false,
        },
    },
};
</script>

