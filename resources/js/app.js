import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

import Layout from './Layouts/App.vue';

const pages = import.meta.glob('./Pages/**/*.vue');

createInertiaApp({
    resolve: name => {
        const importPage = pages[`./Pages/${name}.vue`];

        if (importPage == false) {
            throw new Error(`Страница ${name} не найдена!`);
        }

        return importPage().then(module => {
            const page = module.default;
            page.layout = page.layout || Layout;

            return page;
        });
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route: window.route } })
            .mount(el);
    },
});
