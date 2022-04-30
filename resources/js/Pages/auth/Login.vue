<template>
    <Head :title="$t('Login')" />

    <AuthLayout>

        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <Link :href="route('home')" class="h1"><b>{{ $page.props.app_name }}</b></Link>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">{{ $t('sign_in_to_start_your_session') }}</p>

                    <form @submit.prevent="form.post(route('login'))">
                        <div class="input-group mb-3">
                            <input v-model="form.email" type="email" class="form-control " :placeholder="$t('email')"
                                   :class="{ 'is-invalid' : errors.email }">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.email" class="alert alert-danger text-sm">{{ errors.email }}</div>

                        <div class="input-group mb-3">
                            <input v-model="form.password" type="password" class="form-control" :placeholder="$t('password_field')"
                                   :class="{ 'is-invalid' : errors.email }">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.password" class="alert alert-danger text-sm">{{ errors.password }}</div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input v-model="form.remember_me" type="checkbox" id="remember" class="mr-2">
                                    <label for="remember">
                                        {{ $t('remember_me') }}
                                    </label>
                                </div>
                            </div>
                            <div v-if="errors.remember_me" class="alert alert-danger text-sm">{{ errors.remember_me }}</div>

                            <!-- /.col -->
                            <div class="col-4">
                                <button :disabled="form.processing" type="submit" class="btn btn-primary btn-block">{{ $t('sign_in') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <Link :href="route('auth.google.redirect')" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            {{ $t('sign_in_using_google') }}
                        </Link>
                    </div>
                    <!-- /.social-auth-links -->

                    <p class="mb-1">
                        <Link :href="route('password.request')">{{ $t('i_forgot_my_password') }}</Link>
                    </p>
                    <p class="mb-0">
                        <Link :href="route('register')" class="text-center">{{ $t('Register a new membership') }}</Link>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </AuthLayout>
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/AuthLayout";

export default {
    name: "Login",
    components: {
        AuthLayout,
        Head,
        Link,
    },
    props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            email: '',
            password: '',
            remember_me: '',

        })

        return {form}
    }
};
</script>
