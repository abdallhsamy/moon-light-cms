<template>
    <div class="wrapper">
        <MainHeader/>

        <MainSidebar/>

        <div class="content-wrapper">

            <slot/>

        </div>

        <ControlSidebar/>

        <MainFooter/>
    </div>
</template>

<script>
import ControlSidebar from "./ControlSidebar";
import MainSidebar from "./MainSidebar";
import MainHeader from "./MainHeader";
import MainFooter from "./MainFooter";

export default {
    name: "DashboardLayout",
    components: {
        MainFooter,
        MainHeader,
        MainSidebar,
        ControlSidebar
    }
}
</script>

<style scoped>

</style>
