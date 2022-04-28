<template>
    <div v-if="$page.props.flash.message" class="alert alert-primary" role="alert">
        {{  $page.props.flash.message }}
    </div>
</template>

<script>
export default {
    name: "FlashMessages"
}
</script>

<style scoped>

</style>
