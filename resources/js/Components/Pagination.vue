<template>
    <nav v-if="links.length > 3" aria-label="Page navigation example">
        <ul class="pagination">
            <template v-for="(link, key) in links">
                <li v-if="link.url === null" :key="key"
                    class="page-item" v-html="link.label" />
                <li v-else class="page-item">
                    <inertia-link :key="key" class="page-link" :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
                </li>

            </template>
        </ul>
    </nav>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue3";

export default {
    components : {
        InertiaLink
    },
    props: {
        links: Array
    },
}
</script>

<style scoped>

</style>
