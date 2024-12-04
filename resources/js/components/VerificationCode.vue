<template>
    <form @click.prevent="onsubmit">
        <div class="row mb-3">
            <div class="col-8">
                <div class="">
                    <div class="col-12 text-muted">
                        Please use your mobile number {{phone_number}}  to recieve the verification code
                    </div>
                </div>
            </div>
            <div class="col-3">
                <button type="submit" @click="active = !active" :class="{getCodeButtonActive: active}" class="getCodeButton px-4 py-1">Get</button>
            </div>
        </div>
    </form>

</template>

<script>
import axios from "axios";

export default {
    name: "SMS",
    props:['phone_number'],
    data() {
        return {
            active : false ,
            form:{
                phoneNumber: this.phone_number
            }
        };
    },
    methods: {
        onsubmit() {
            axios.get('/sms-code/',{params: {phoneNumber: this.form.phoneNumber}})
                .then((res) => {
                    this.$toast.success("Successfully sent a verification code !");
                })
                .catch((error) => {
                    console.log(error)
                    this.$toast.error(error.response.data.errors.phoneNumber[0]);
                }).finally(() => {
                //Perform action in always
            });
        },
    },
}
</script>

<style scoped>
.getCodeButton{
    background-color: rgba(59, 57, 57, 0.74);
    border: 1px solid white;
    color: white;
    border-radius : 25px;

}
.getCodeButtonActive{
    background-color: white;
    color:rgba(59, 57, 57, 0.74) ;
}
</style>
