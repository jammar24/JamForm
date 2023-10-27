<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>
        <pre>{{ $page?.props?.auth }}</pre>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <Link :href="route('cuestionario.create')" class="text-white bg-purple-700 rounded-md">Crear Cuestionario</Link>
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
