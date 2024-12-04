import './bootstrap';
import { createApp } from 'vue';

import Toaster from '@meforma/vue-toaster';
import Shark from "./components/Shark/Shark";
import ToastDynamic from "./components/ToastDynamic";
import quantShow from "./components/QuantTrade/QuantShow";
import MyStrategies from "./components/Strategy/MyStrategies";
import Faq from "./components/Helper/Faq";
import VerificationCode from "./components/VerificationCode";
import Active from "./components/Strategy/show/Active";
import ExchangeRates from "./components/Exchange/ExchangeRates";
import TeamMember from "./components/Teams/TeamMember";
import Finished from "./components/Strategy/show/Finished";
import EmailVerification from './components/EmailVerification'
import PaymentPassword from './components/Auth/Passwords/PaymentPassword'
import ActiveWorkingStrategy from './components/Strategy/ActiveWorkingStrategy'

const app = createApp({}).use(Toaster, {
    position: "top-right",
});

app.component('shark', Shark);
app.component('faq', Faq);
app.component('toast-dynamic', ToastDynamic);
app.component('quant-show', quantShow);
app.component('my-strategies', MyStrategies);
app.component('verification-code', VerificationCode);
app.component('email-verification', EmailVerification);
app.component('payment-password', PaymentPassword);
app.component('active', Active);
app.component('exchange-rates', ExchangeRates);
app.component('team-member', TeamMember);
app.component('active-working-strategy', ActiveWorkingStrategy);
app.component('finished', Finished);


app.mount('#app');
