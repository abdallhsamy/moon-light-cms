<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="index3.html" class="brand-link">
            <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Moon Light CMS</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img :src="$page.props.auth.user.avatar" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{  $page.props.auth.user.name }}</a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li v-if="menu" v-for="item in menu" :key="item.title" class="nav-item" :class="{ 'menu-open' : $page.component.startsWith(item.folder) }">
                        <template v-if="$page.props.auth.can[item.permission]">
                            <a :href="item.link ?? '#'" class="nav-link" :class="{ 'active' : $page.component.startsWith(item.folder) }">
                                <i :class="item.icon"></i>
                                <p>
                                    {{  ' ' + item.title }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul v-if="item.sub_list" class="nav nav-treeview">
                                <template v-for="sub_item in item.sub_list" :key="sub_item.title">
                                    <li class="nav-item" v-if="$page.props.auth.can[sub_item.permission]">
                                        <Link :href="route(sub_item.route) ?? ''" class="nav-link" :class="{'active' : $page.component === sub_item.component }">
                                            <i v-if="sub_item.icon" :class="sub_item.icon"></i>
                                            <p>{{  sub_item.title }}</p>
                                        </Link>
                                    </li>
                                </template>
                            </ul>
                        </template>

                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Simple Link
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>

    </aside>
</template>

<script>
import {menu} from "../data/sidebar/index"
import { Link } from "@inertiajs/inertia-vue3"

export default {
    name: "MainSidebar",
    components : {
        Link
    },
    data() {
        return {
            menu: menu
        }
    },
    setup() {
        // menu.forEach((item)=> {
        //     console.log(item.sub_list)
        // })
    },
    methods: {
        // validateSinglePermission(permission) {
        //     // console.log($page.props.auth.can.keys())
        //     console.log(permission)
        // },
        // validatePermission(permissions) {
        //     if(permissions === '' || permissions == null) {
        //         return true;
        //     }
        //
        //     if(typeof permissions == 'string') {
        //         this.validateSinglePermission(permissions)
        //     }
        //     if(Array.isArray(permissions)) {
        //         permissions.forEach(function (item) {
        //             validateSinglePermission(item)
        //         })
        //     }
        //
        //
        //     return false;
        // },
    },
}
</script>

<style scoped>

</style>
