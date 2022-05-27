require('./bootstrap');
import { createApp } from 'vue';
import router from './router';
import App from './components/App';
import Toaster from '@meforma/vue-toaster';


createApp(App)
    .use(router)
    .use(Toaster)
    .mount("#app");