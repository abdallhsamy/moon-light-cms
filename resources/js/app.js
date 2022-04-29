require('./bootstrap');

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { i18nVue } from 'laravel-vue-i18n'

InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: '#29d',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: true,
})

createInertiaApp({
    initialPage: JSON.parse(document.getElementById('app').dataset.page),
    resolve: (name) => {
        let parts = name.split('::')
        let type = false
        if (parts.length > 1) type = parts[0]
        if(type) return require(`../../Modules/${type}/Resources/assets/js/${parts[1]}`).default
        return require(`./Pages/${name}`).default
    },
    // resolve: (name) => require(`./Pages/${name}`),
    title: title => `${title} - Moon Light CMS`,
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18nVue, {
                resolve: lang => import(`../../lang/${lang}.json`),
            })
            .mixin({ methods : {route} })
            .mount(el);
    },
});
