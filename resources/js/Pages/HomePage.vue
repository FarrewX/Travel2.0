<script setup>
//import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Home"></head>
    <!--<AppLayout title="Home">-->
        <AppLayout></AppLayout>
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home Page
            </h2>
        </div>

    <!--</AppLayout>-->
</template>

<style>

</style>
