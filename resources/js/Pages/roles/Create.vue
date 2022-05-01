<template>
    <Head :title="$t('Create Role')" />

    <DashboardLayout>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">{{ $t('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ $t('Role Management') }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('roles.index')" class="float-sm-right btn btn-primary mb-3">
                            {{ $t('Roles List') }}
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $t('Create Role') }}</h3>
                            </div>


                            <form @submit.prevent="form.post(route('roles.store'))">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">{{ $t('Name') }}</label>
                                        <input v-model="form.name" type="text" class="form-control" id="name" :placeholder="$t('Name')"
                                               :class="{'is-invalid' : errors.name }">
                                        <p class="text-danger text-sm">
                                            {{ errors.name }}
                                        </p>
                                    </div>


                                    <!-- Bootstrap Switch -->
                                    <div v-if="groupedPermissions" class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Permissions</h3>
                                        </div>


                                        <div class="card-body overflow-hidden">
                                            <div class="row g-2 row justify-content-around">
                                                <div v-for="(array, group) in groupedPermissions" class="col-sm-6 col-md-4 col-lg-3  card">
                                                    <span class="text-bold text-center btn btn-success btn-block"
                                                          @click="()=>{selectPermissions(array)}">{{  group }}</span>

                                                    <template v-for="item in array" :key="item.id">

                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item" >
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input
                                                                        @click="()=>{selectSinglePermission(item.id)}"
                                                                        :value="item.id"
                                                                        v-model="form.permissions"
                                                                        type="checkbox" data-toggle="toggle">
                                                                    <span class="ml-2 text-sm">{{  item.name }}</span>
                                                                </label>
                                                            </div>
                                                        </a>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->



                                <div class="card-footer">
                                    <button :disabled="form.processing" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </DashboardLayout>
</template>


<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import DashboardLayout from "@/Layouts/DashboardLayout";
import { getCurrentInstance } from "vue";

document.body.className = 'hold-transition sidebar-mini';

export default {
    name: "Index",
    components: {
        DashboardLayout,
        Head,
        Link,
    },
    props: {
        groupedPermissions : Array,
        errors: Object,
    },
    setup() {
        const form = useForm({
            name: '',
            permissions : []
        })
        return {form}
    },
    methods: {
        selectPermissions(array){
            array.forEach((item)=>{
                this.selectSinglePermission(item.id)
            })
        },
        selectSinglePermission(id) {
            //in here you can check what ever condition  before append to array.
            if(this.form.permissions.includes(id)){
                let index = this.form.permissions.indexOf(id);
                if (index > -1) {
                    this.form.permissions.splice(index, 1); // 2nd parameter means remove one item only
                }
            }else{
                this.form.permissions.push(id)
            }
        }
    }
}
</script>
