<template>
    <div class="container ">
        <div class="text-center">
            <h5 class="text-white px-2 mb-0">
                Balance
            </h5>
            <h4>
                {{ wallet.amount }}
                <img src="/images/Tether-USDT-icon.webp" width="25" alt="USDT">

            </h4>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-column">
            <form @submit.prevent="onSubmit" class="w-100 p-2">
                <div class="sectionnn my-3">
                    <div class="form-group mb-3">
                        <label for="fox" class="col-12 text-white mb-2">
                            <span class="icon">
                                <img src="/images/spider-multicolor.svg" alt="" width="25" style="width: 25px">
                            </span>
                            <span class="text">
                                SpiderWeb
                            </span>
                        </label>
                        <div class="webflow-style-input select">
                            <select v-model="form.fox" @change="setMargin" class="input-background" id="fox" name="fox"
                                    aria-label="Default select example">

                                <option value="" v-if="quantiq_fox.length == 0" selected>Please purchase a SpiderWeb to use the
                                    feature
                                </option>
                                <option v-else value=""  selected>Please select SpiderWeb</option>

                                <option  v-for="fox in quantiq_fox"

                                         :value="fox"
                                         :key="fox.id"
                                >
                                    {{ fox.name.toUpperCase() }}, Available for {{ fox.duration }} days
                                </option>
                            </select>
                        </div>
                        <div  v-if="errors.fox" style="color: red;" class="form-error" >
                            <div>{{ errors.fox[0]}}</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-12 text-white mb-2">
                            <span class="icon">
                                <img src="/images/amount.svg" alt="" width="20" style="width: 20px">
                            </span>
                            <span class="text">
                                Amount
                            </span>
                        </label>

                        <div class="webflow-style-input">
                            <input type="number" v-model="form.amount" @keyup="calculateEarnings" min="1" step="any"
                                   placeholder="Enter an amount at least 10 USDT"
                                   class=""
                                   id="amount" name="amount">
                        </div>

                        <div  v-if="errors.amount" style="color: red;" class="form-error" >
                            <div>{{ errors.amount[0]}}</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-column my-3 sectionnn p-2">
                    <div class="row px-2 py-1 align-items-center text-decoration-none border-bottom">
                        <div class="col-7">SpiderWeb</div>
                        <div class="col-3 ">
                            {{ form.fox.name }}
                        </div>
                        <div class="col-2">
<!--                            <img style="width: 25px;" src="/images/falconai.png" alt="logo">-->
                            <img style="width: 25px;" src="/images/logo-main.png" alt="logo">
                        </div>
                    </div>
                    <div class="row px-2 py-1 align-items-center text-decoration-none border-bottom">
                        <div class="col-7">Amount</div>
                        <div class="col-3 ">
                            {{ form.amount }}
                        </div>
                        <div class="col-2">
                            <img style="width: 25px;"
                                 src="/images/Tether-USDT-icon.webp" alt="logo">
                        </div>
                    </div>
                    <div class="row px-2 py-1 align-items-center text-decoration-none border-bottom">

                        <div class="col-7">Cycle</div>
                        <div class="col-3 ">
                            {{ calculateDuration() }}
                        </div>
                        <div class="col-2">
                            <img style="width: 25px;" src="/images/money-flow.png" alt="logo">
                        </div>
                    </div>
                    <div class="row px-2 py-1 align-items-center text-decoration-none">

                        <div class="col-7">Estimated Earnings</div>
                        <div class="col-3 ">
                            {{ form.earnings }}
                        </div>
                        <div class="col-2">
                            <img style="width: 25px;" src="/images/earnings.png" alt="logo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="button-14" type="submit" role="button">
                        <span class="text">Buy</span>
                        <span class="button-14-background blue"></span>
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
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "QuantShow",
    props: ['quantiq_fox', 'wallet', 'quant_trade','shark_pivot_id'],
    data() {
        return {
            form: {
                fox: '',
                user_id: this.wallet.user_id,
                amount: '',
                cycle: this.quant_trade.duration,
                earnings: 0,
                percentage: 0
            },
            errors : [],
        };
    },
    methods: {
         onSubmit: function () {
             axios.post('/quant-trade', this.form)
                .then((res) => {
                    location.href = "/my-strategy"
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                }).finally(() => {
                //Perform action in always
            });
        },
        calculateEarnings()
        {
            this.form.earnings = parseFloat((this.form.cycle * this.form.fox.percentage/100) * this.form.amount).toFixed(2)  ;
        },
        setMargin()
        {
            this.calculateEarnings()
            this.form.percentage = this.form.fox.percentage
        },
        calculateDuration(){
             if (this.form.cycle > 24){
                 return this.form.cycle / 24 + ' Days'
             }
            if (this.form.cycle === 24){
                return (this.form.cycle / 24) + ' Day'
            }
            return (this.form.cycle) + ' Hours'
        }
    },
    created() {
    }

}
</script>

<style scoped>

</style>
