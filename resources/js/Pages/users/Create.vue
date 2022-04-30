<template>
    <Head :title="$t('Create User')" />

    <DashboardLayout>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">{{ $t('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ $t('User Management') }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('users.index')" class="float-sm-right btn btn-primary mb-3">
                            {{ $t('Users List') }}
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
                                <h3 class="card-title">{{ $t('Create User') }}</h3>
                            </div>


                            <form @submit.prevent="form.post(route('users.store'))">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">{{ $t('Name') }}</label>
                                        <input v-model="form.name" type="text" class="form-control" id="name" :placeholder="$t('Name')"
                                            :class="{'is-invalid' : errors.name }">
                                        <p class="text-danger text-sm">
                                            {{ errors.name }}
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ $t('Email') }}</label>
                                        <input v-model="form.email" type="email" class="form-control" id="email" :placeholder="$t('name.domain.tld')"
                                           :class="{'is-invalid' : errors.email }">
                                        <p class="text-danger text-sm">
                                            {{ errors.email }}
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ $t('Password') }}</label>
                                        <input v-model="form.password" type="password" class="form-control" id="password" placeholder="S3cRetP@$$w0rd"
                                               :class="{'is-invalid' : errors.password }">
                                        <p class="text-danger text-sm">
                                            {{ errors.password }}
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ $t('Password Confirmation') }}</label>
                                        <input v-model="form.password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="S3cRetP@$$w0rd">
                                    </div>
                                </div>

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

document.body.className = 'hold-transition sidebar-mini';

export default {
    name: "Index",
    components: {
        DashboardLayout,
        Head,
        Link,
    },
    props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        })

        return {form}
    }
};
</script>
