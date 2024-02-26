<script setup>
//import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </div>

</template>

<style>

</style>
