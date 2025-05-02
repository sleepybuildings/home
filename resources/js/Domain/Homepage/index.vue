<script setup lang="ts">
import Layout from "@/App/Layout.vue";
import Panel from "@/App/Panel.vue";
import SiteData = App.Domains.Homepage.Data.SiteData;
import Sites from "@/Domain/Homepage/Sites.vue";

defineProps<{
    sites: SiteData[],
}>();

</script>

<template>
    <Layout>
        <div class="p-6 grid grid-cols-5 grid-rows-1 gap-4 h-full">
            <Panel class="col-span-2 bg-rose-pine-overlay">
                <Sites :sites="sites"/>
            </Panel>
            <Panel class="col-span-3">
                ...
            </Panel>
        </div>
    </Layout>
</template>
