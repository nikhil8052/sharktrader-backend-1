
<template>
    <div class="mb-2">
        <label for="currentPassword"
                class="col-12 col-form-label text-white">Current Payment Password</label>

        <div class="col-12 d-flex align-items-center">
            <div class="webflow-style-input">
                <input id="currentPassword"
                       :type="passwordsVisibility"
                       class=""
                       name="currentPassword" :value="paymentpassword"
                       readonly
                       autocomplete="currentPassword" />
                <button type="button"><i @click="this.passwordsVisibility = (this.passwordsVisibility === 'password' ? 'text' : 'password')" :style="{fontSize: '20px'}" class="bi bi-eye mx-2 text-white"></i></button>
            </div>
        </div>
    </div>
    <div class="mb-2">
        <label for="newPassword" class="col-12 col-form-label text-white">New Payment Password</label>

        <div class="col-12 d-flex align-items-center">
            <div class="webflow-style-input">
                <input id="newPassword"
                       :type="passwordsVisibility"
                       class=""
                       name="newPassword"
                       v-model="newPassword"
                       autocomplete="password" />
                <button type="button"><i @click="this.passwordsVisibility = (this.passwordsVisibility === 'password' ? 'text' : 'password')" :style="{fontSize: '20px'}" class="bi bi-eye mx-2 text-white"></i></button>
            </div>
        </div>
    </div>
    <div class="mb-2">
        <label for="repeatPassword" class="col-12 col-form-label text-white">Repeat Payment Password</label>

        <div class="col-12 d-flex align-items-center">
            <div class="webflow-style-input">
                <input id="repeatPassword"
                       :type="passwordsVisibility"
                       class=""
                       name="repeatPassword"
                       v-model="repeatPassword"
                       autocomplete="password">
                <button type="button"><i @click="this.passwordsVisibility = (this.passwordsVisibility === 'password' ? 'text' : 'password')" :style="{fontSize: '20px'}" class="bi bi-eye mx-2 text-white"></i></button>

            </div>
        </div>
    </div>
    <div class="row">
<!--        <button class="menu-button p-2 w-auto m-auto" >Generate a Strong Password</button>-->
        <button class="button-14" role="button" @click.prevent.stop="this.generatePassword()">
            <span class="text">
                Generate a Strong Password
            </span>
            <span class="button-14-background blue"></span>
            <!--                <span class="button-14-border"></span>-->

            <!-- mask-border fallback -->
            <svg style="position: absolute;" width="0" height="0">
                <filter id="remove-black-button-14" color-interpolation-filters="sRGB">
                    <feColorMatrix type="matrix" values="1 0 0 0 0
0 1 0 0 0
0 0 1 0 0
-1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                    <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>
                </filter>
            </svg>
        </button>
    </div>
</template>

<script>
export default {
    name: "PaymentPasswordCMP",
    props: {
        paymentpassword: {
            type: String,
        }
    },
    data() {
        return {
            newPassword: '',
            repeatPassword: '',
            passwordsVisibility: 'password'
        }
    },
    methods: {
        generatePassword() {
            const length = 12;
            const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=';
            let result = '';
            for (let i = 0, n = charset.length; i < length; ++i) {
                result += charset.charAt(Math.floor(Math.random() * n));
            }
            this.newPassword = result;
            this.repeatPassword = result;
        },
    },
}
</script>

<style scoped></style>
