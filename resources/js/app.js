require('./bootstrap');

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { i18nVue } from 'laravel-vue-i18n'

InertiaProgress.init();

createInertiaApp({
    title: title => `${title} - Moon Light CMS`,
    resolve: (name) => require(`./Pages/${name}`),
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
