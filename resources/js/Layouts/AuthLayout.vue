<template>
    <div v-if="$page.props.flash.message" class="alert alert-primary" role="alert">
        {{  $page.props.flash.message }}
    </div>

    <slot/>
</template>

<script>
document.body.className = 'hold-transition login-page';

export default { name: "AuthLayout"}
</script>
