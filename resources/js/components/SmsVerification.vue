<template>
    <div class="mb-3">
        <label for="phoneNumber" class="mb-2 fw-bold text-white">
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" baseProfile="tiny" version="1.2" viewBox="0 0 64 64" width="20" height="20"><path fill="#4effff" d="M26 28c-7.72 0-14-6.28-14-14S18.28 0 26 0s14 6.28 14 14S33.72 28 26 28zM46 64c-7.72 0-14-6.28-14-14s6.28-14 14-14 14 6.28 14 14S53.72 64 46 64z" class="color28C8FF svgShape"></path><path fill="#00d2d2" d="M33.294,55.844C21.33,54.494,12,44.318,12,32c0-3.63,0.8-7.13,2.315-10.308C12.855,19.482,12,16.841,12,14
			c0-1.295,0.19-2.543,0.521-3.733C7.015,16.198,4,23.855,4,32c0,17.645,14.355,32,32,32c2.05,0,4.065-0.201,6.04-0.579
			C38.151,62.271,34.972,59.476,33.294,55.844z" class="color008CD2 svgShape"></path></svg>
            </span>
            <span class="text">
                Phone Number
            </span>
        </label>

        <div class="col-12 webflow-style-input p-0">
            <vue-tel-input @validate="phoneObject" id="inputPhone" ref="inputPhone" class="mb-2" :class="{'is-invalid' : !this.valid}" mode="international"></vue-tel-input>
        </div>
        <div v-if="this.valid === false">
            <span class="message">This is not a valid number</span>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { VueTelInput } from 'vue3-tel-input'

export default {
    name: "SMS",
    components:{
        VueTelInput
    },

    data() {
        return {
            valid: null,
        };
    },
    methods: {
        phoneObject: function(obj) {
            this.valid = obj.valid
        },
    },
}
</script>

<style >
#inputPhone{
    background-color: rgba(0, 0, 0, 0.29);
    border: none;
    width: 100%;
    height: 40px;
    //border-radius: 15px;
    //padding-left: 5px;
}
.vti__dropdown-arrow{
    color: #FFFFFF;
}
#inputPhone > input{
    //background-color: rgba(0, 0, 0, 0.29);
    //border-radius: 15px;
    color: #ffffff;
    margin-left: 3px
}
#inputPhone > input::-webkit-input-placeholder{
    color: rgba(255, 255, 255, 0.7);
}
#inputPhone > div{
    //background-color: rgb(0 0 0 / 35%);
}
.vti__selection{

}
#inputPhone > div > ul{
    background-color: #343131FF;
    width:350px;
    margin-top: 4px;
}
.codeButton{
    float: right;
    margin:0;
}

.is-invalid {
    border-color: red;
}

span.message {
    font-size: 10px;
    color: red;
    font-weight: bold;
    text-align: right;
}
.vti__input{
    border-radius: 0 !important;
}
</style>
