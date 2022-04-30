<template>
    <Head :title="$t('register')" />

    <AuthLayout>
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <Link :href="route('home')" class="h1"><b>{{ $page.props.app_name }}</b></Link>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">{{ $t('Register a new membership') }}</p>

                    <form  @submit.prevent="form.post(route('register'))">
                        <div class="input-group mb-3">
                            <input v-model="form.name" type="text" class="form-control" :placeholder="$t('full_name')"
                                   :class="{ 'is-invalid' : errors.name }">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.name" class="alert alert-danger text-sm">{{ errors.name }}</div>

                        <div class="input-group mb-3">
                            <input v-model="form.email" type="email" class="form-control" :placeholder="$t('email')"
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
                                   :class="{ 'is-invalid' : errors.password }">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.password" class="alert alert-danger text-sm">{{ errors.password }}</div>

                        <div class="input-group mb-3">
                            <input v-model="form.password_confirmation" type="password" class="form-control" :placeholder="$t('retype_password')"
                                   :class="{ 'is-invalid' : errors.password }">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
<!--                        <div v-if="errors.password" class="alert alert-danger text-sm">{{ errors.password }}</div>-->

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree" class="mr-2">
                                    <label for="agreeTerms">
                                        {{ $t('I agree to') }}  the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">{{ $t('register') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center">
                        <Link :href="route('auth.google.redirect')" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            {{ $t('sign up using google') }}
                        </Link>
                    </div>

                    <Link :href="route('login')" class="text-center">{{ $t('I already have a membership') }}</Link>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <!-- /.register-box -->

    </AuthLayout>
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/AuthLayout";

document.body.className ='hold-transition register-page';

export default {
    name: "Register",
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
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            agree: '',

        })

        return {form}
    }
};
</script>
