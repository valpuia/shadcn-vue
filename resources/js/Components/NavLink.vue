<script setup lang="ts">
defineProps({
    href: String,
    active: Boolean,
});
</script>

<template>
    <Link
        :href="href"
        class="transition-colors hover:text-foreground"
        :class="active ? 'text-foreground' : 'text-muted-foreground'"
    >
        <slot />
    </Link>
</template>
