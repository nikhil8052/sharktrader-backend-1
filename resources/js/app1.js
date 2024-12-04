import './bootstrap';

import { createApp } from 'vue';

import Toaster from '@meforma/vue-toaster';
import Slider from "./components/Slider";
import ProgressBar from "./components/ProgressBar";
import MainMenu from "./components/MainMenu";
import SmsVerification from "./components/SmsVerification";
import UserMenu from "./components/Menus/UserMenu";
import ToastDynamic from "./components/ToastDynamic";


const app = createApp({}).use(Toaster, {
    position: "top-right",
});

app.component('slider-main', Slider);
app.component('progress-bar', ProgressBar);
app.component('main-menu', MainMenu);
app.component('sms-verification', SmsVerification);
app.component('user-menu', UserMenu);
app.component('toast-dynamic', ToastDynamic);

app.mount('#app');
