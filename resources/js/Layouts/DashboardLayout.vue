<template>
    <div class="wrapper">
        <MainHeader/>

        <MainSidebar/>

        <div class="content-wrapper">
<!--            <MainSidebar/>-->

            <div v-if="$page.props.flash.message" class="alert alert-primary" role="alert">
                {{  $page.props.flash.message }}
            </div>

            <slot/>

        </div>

        <ControlSidebar/>

        <MainFooter/>
    </div>
</template>

<script>
import ControlSidebar from "./ControlSidebar";
import FlashMessages from "./FlashMessages";
import MainFooter from "./MainFooter";
import MainHeader from "./MainHeader";
import MainSidebar from "./MainSidebar";

export default {
    name: "DashboardLayout",
    components: {
        ControlSidebar,
        FlashMessages,
        MainFooter,
        MainHeader,
        MainSidebar,
    }
}
</script>

<style scoped>

</style>
