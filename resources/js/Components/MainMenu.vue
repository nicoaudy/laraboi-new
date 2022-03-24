<template>
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <Link :href="route('dashboard')" class="flex items-center text-white py-4 pl-6 nav-item" :class="isUrl('dashboard') ? 'active-nav-link' : null">
            <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
            </Link>
            <Link :href="route('users')" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item" :class="isUrl('users') ? 'active-nav-link' : null">
            <i class="fas fa-sticky-note mr-3"></i>Users
            </Link>
        </nav>
    </aside>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        name: "MainMenu",
        components: {
            Link
        },
        methods: {
            isUrl(...urls) {
                let currentUrl = this.$page.url.substr(1)
                if (urls[0] === '') {
                    return currentUrl === ''
                }
                return urls.filter((url) => currentUrl.startsWith(url)).length
            },
        },
    }
</script>