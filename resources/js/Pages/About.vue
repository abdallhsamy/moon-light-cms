<template>
    <div>
        <h1>inertiajs is {{ about_us }}</h1>

        <Link :href="route('home')">Home</Link>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
        props: ["about_us"],
    },
};
</script>
