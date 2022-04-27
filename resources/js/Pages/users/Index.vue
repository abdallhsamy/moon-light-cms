<template>
    <DashboardLayout>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $t('Starter Page') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ $t('Home') }}</a></li>
                            <li class="breadcrumb-item active">{{ $t('Starter Page') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title">Users List</h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's
                                    content.
                                </p>
                            </div>
                            <div class="card-body">

                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr  v-for="user in users.data" :key="user.id">
                                        <td>{{  user.id }}</td>
                                        <td>{{  user.name }}</td>
                                        <td>{{  user.email }}</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">{{  user.email_verified_at ? 'yes' : 'no' }}</span></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-footer">
                                <pagination class="" :links="users.links" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </DashboardLayout>
</template>


<script>
import { Link } from "@inertiajs/inertia-vue3";
import DashboardLayout from "@/Layouts/DashboardLayout";
import Pagination from '@/Components/Pagination'

export default {
    name: "Index",
    components: {
        DashboardLayout,
        Link,
        Pagination
    },
    props: {
        users: Object
    },
};
</script>
