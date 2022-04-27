<template>
    <DashboardLayout>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $t('users_header_title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ $t('breadcrumb_dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ $t('breadcrumb_user_management') }}</li>
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
                                <h5 class="card-title">{{ $t('users_header_title') }}</h5>
                                <p class="card-text">
                                    {{ $t('users_header_sub_title') }}
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="mb-4 col-md-4 ">
                                    <input type="search" v-model="params.search" aria-label="Search" placeholder="Search..." class="form-control"/>
                                </div>

                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                    <tr>
                                        <th @click="sort('id')" style="width: 10px">#</th>
                                        <th @click="sort('name')">
                                            {{ $t('users_table_name') }}
                                            <svg style="width:12px; height:12px;" v-if="params.field === 'name' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="float-right" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                            </svg>

                                            <svg style="width:12px; height:12px;" v-if="params.field === 'name' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="float-right" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                            </svg>
                                        </th>
                                        <th @click="sort('email')">
                                            {{ $t('users_table_email') }}
                                            <svg style="width:12px; height:12px;" v-if="params.field === 'email' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="float-right" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                            </svg>

                                            <svg style="width:12px; height:12px;" v-if="params.field === 'email' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="float-right" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                            </svg>
                                        </th>
                                        <th style="width: 40px">{{ $t('users_table_verified') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr  v-for="(user, index) in users.data" :key="user.id">
                                        <td>{{  user.id }}</td>
                                        <td>{{  user.name }}</td>
                                        <td>{{  user.email }}</td>
                                        <td>
                                            <span class="badge "
                                                  :class="{ 'bg-success' : user.email_verified_at ,'bg-danger' : !user.email_verified_at }">
                                                {{  user.email_verified_at ? $t('boolean_yes') : $t('boolean_no') }}
                                            </span>
                                        </td>
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
import { pickBy, throttle } from 'lodash';

export default {
    name: "Index",
    components: {
        DashboardLayout,
        Link,
        Pagination
    },
    props: {
        users: Object,
        filters: Object,
    },
    data() {
        return {
            params: {
                search: this.filters.search,
                field: this.filters.field,
                direction: this.filters.direction,
            },
        };
    },
    methods: {
        sort(field) {
            this.params.field = field;
            this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc';
        },
    },
    watch: {
        params: {
            handler: throttle(function () {
                let params = pickBy(this.params);

                this.$inertia.get(this.route('users.index'), params, { replace: true, preserveState: true });
            }, 150),
            deep: true,
        },
    },
};
</script>
