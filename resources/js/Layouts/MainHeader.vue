<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">

                <Link :href="route('home')" class="nav-link">Home</Link>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <Link :href="route('about-us')" class="nav-link">Contact</Link>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <!-- search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <!-- end of search -->

            <!-- comments -->
            <!--            <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-comments"></i>
                                <span class="badge badge-danger navbar-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="#" class="dropdown-item">

                                    <div class="media">
                                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Brad Diesel
                                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">Call me whenever you can...</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">

                                    <div class="media">
                                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                John Pierce
                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">I got your message bro</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">

                                    <div class="media">
                                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Nora Silvester
                                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">The subject goes here</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                            </div>
                        </li>-->

            <!-- end of comments -->

            <!-- notifications -->
            <!--            <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-warning navbar-badge">15</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-header">15 Notifications</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-users mr-2"></i> 8 friend requests
                                    <span class="float-right text-muted text-sm">12 hours</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-file mr-2"></i> 3 new reports
                                    <span class="float-right text-muted text-sm">2 days</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                        </li>-->

            <!-- end of notifications -->


            <!-- fullscreen -->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <!-- end of fullscreen -->

            <!-- user -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img :src="$page.props.auth.user.avatar"
                         class="brand-image img-circle mr-2" style="max-height: 22px;" alt="User Avatar">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<!--                    <span class="dropdown-header">Logout</span>-->
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
<!--                        <span class="float-right text-muted text-sm">3 mins</span>-->
                    </a>
                    <div class="dropdown-divider"></div>
                    <Link :href="route('logout')" method="post" class="dropdown-item">
                        <i class="fa fa-sign-out-alt mr-2"></i> Logout
<!--                        <span class="float-right text-muted text-sm">12 hours</span>-->
                    </Link>
<!--                    <div class="dropdown-divider"></div>-->
<!--                    <a href="#" class="dropdown-item">-->
<!--                        <i class="fas fa-file mr-2"></i> 3 new reports-->
<!--                        <span class="float-right text-muted text-sm">2 days</span>-->
<!--                    </a>-->
<!--                    <div class="dropdown-divider"></div>-->
<!--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
                </div>
            </li>

            <!-- end of user -->


            <!-- control sidebar -->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">-->
<!--                    <i class="fas fa-th-large"></i>-->
<!--                </a>-->
<!--            </li>-->
            <!-- end of control sidebar -->
        </ul>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    name: "MainHeader",
    components: {
        Link
    }
}
</script>

<style scoped>

</style>
