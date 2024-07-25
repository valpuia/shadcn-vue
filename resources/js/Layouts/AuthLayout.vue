<script setup lang="ts">
import Navigation from "@/Components/Navigation.vue";
</script>

<template>
    <Navigation />

    <main class="container mx-auto py-8 px-4 md:px-0">
        <slot />
    </main>
</template>
