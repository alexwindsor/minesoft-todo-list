<script setup>
    import { Link } from '@inertiajs/vue3'
    import { base_url } from '@/base_url.js'

    const props = defineProps({
        links: Object,
        filters: Object
    })

</script>

<template>

<div class="text-center">
    <div v-for="link in links" class="inline-block">
        <Link 
            v-if="link.url !== null"
            :href="link.url.replace('/getTodoLists', base_url) + '&mine_or_all=' + filters.mine_or_all"
            class="inline-block border border-black p-2 m-2"
            :class="{
                'bg-black text-white': link.active,
                'w-10': Number(link.label) > 0
            }"
            v-html="link.label"
        ></Link>
        <div v-if="link.url === null" class="border border-black p-2 m-2 w-10">...</div>
    </div>
</div>

</template>