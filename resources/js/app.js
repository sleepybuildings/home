import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import '../css/app.css';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Domain/**/*.vue', { eager: true })
        return pages[`./Domain/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
