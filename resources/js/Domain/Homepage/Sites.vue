<script setup lang="ts">
defineProps<{
    sites: SiteData[],
}>();
</script>

<template>
    <div class="p-4 flex flex-col gap-2">
        <template v-for="site in sites">
            <a href="{{ site.url }}" class="border-rose-pine-base border rounded py-2 flex hover:border-rose-pine-iris hover:bg-rose-pine-base-[50%] hover:shadow">
                <div>IMG</div>
                {{ site.name }}
            </a>
        </template>
    </div>
</template>

<style scoped>

</style>
