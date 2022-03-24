<script setup>
    import { ref } from 'vue';

    import MainMenu from '@/Components/MainMenu';
    import { Link } from '@inertiajs/inertia-vue3'
    import BreezeDropdown from '@/Components/Dropdown.vue';
    import BreezeDropdownLink from '@/Components/DropdownLink.vue';

    const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="bg-gray-100 font-family-karla flex">
        <MainMenu></MainMenu>

        <div class="w-full flex flex-col h-screen overflow-y-hidden">

            <!-- Menu Desktop Header -->
            <div class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                <div class="w-1/2"></div>
                <div class="relative w-1/2 flex justify-end">
                    <BreezeDropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    {{ $page.props.auth.user.name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </BreezeDropdownLink>
                        </template>
                    </BreezeDropdown>
                </div>
            </div>

            <!-- Mobile Header & Nav -->
            <header class="w-full bg-sidebar py-5 px-6 sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="text-white text-3xl focus:outline-none">
                        <i class="fas fa-bars" :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"></i>
                        <i class="fas fa-times" :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav class="flex flex-col pt-4" :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}">
                    <Link :href="route('dashboard')" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                    </Link>
                    <Link :href="route('users')" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>Users
                    </Link>
                </nav>
            </header>

            <div class="w-full overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
                    <slot></slot>
                </main>

                <footer class="w-full bg-white text-right p-4">
                    Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
                </footer>
            </div>

        </div>
    </div>
</template>