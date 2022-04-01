<template>
    <Layout>
        <h1 class="w-full text-3xl text-black pb-6">Forms</h1>
    </Layout>
</template>

<script>
    import Layout from '@/Layouts/Authenticated'
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

    export default {
        name: "User",
        components: {
            Layout,
            BreezeAuthenticatedLayout
        }
    }
</script>