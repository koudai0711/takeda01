import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/vue3';
import { InertiaProgress } from '@inertiajs/progress';

// Inertia.jsの初期化
createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .mount(el);
  },
});

// プログレスバーの設定
InertiaProgress.init({
  color: '#4B5563',
  showSpinner: true,
});
