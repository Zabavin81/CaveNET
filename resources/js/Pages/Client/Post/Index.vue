<template>
    <div class="bg-gray-900 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">
                    Все посты
                </h2>
                <p class="mt-2 text-lg/8 text-gray-300">Laravel + Vue</p>
            </div>

            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <div v-for="post in posts" :key="post.id">
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time class="text-gray-400">
                                {{ post.published_at }}
                            </time>

                            <a
                                href="#"
                                class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800"
                            >
                                {{post.category}}
                            </a>
                        </div>

                        <div class="group relative grow">
                            <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ post.title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">
                                {{ post.body }}
                            </p>
                        </div>

                        <div class="relative mt-8 flex items-center gap-x-4 justify-self-end">
                            <img
                                src="https://cdn.vectorstock.com/i/500p/00/65/user-profile-grey-icon-web-avatar-employee-vector-32550065.jpg"
                                alt="Avatar"
                                class="size-10 rounded-full bg-gray-800"
                            />
                            <div class="text-sm/6">
                                <p class="font-semibold text-white">
                                    <a href="#"><span class="absolute inset-0"></span>{{post.author}}</a>
                                </p>
                            </div>

                            <div class="flex items-center gap-x-2 text-xs">
                                <a
                                    href="#"
                                    class="inline-flex items-center gap-x-1.5 relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                                    </svg>
                                    {{ post.likes }}
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Index',
    props: {
        posts: {
            type: Array,
            required: false,
        },
    },
};
</script>

