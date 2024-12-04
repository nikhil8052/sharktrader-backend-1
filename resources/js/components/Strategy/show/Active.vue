<template>
    <div class="container ">
        <div class="card-background w-100 mt-4 py-2 bg-fade-dark">
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white border-bottom-1">
                <div class="">
                    Order No:
                </div>
                <div>
                    {{ strategy.order_id }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white border-bottom-1">
                <div>
                    SpiderWeb:
                </div>
                <div>
                    {{ strategy.name }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white border-bottom-1">
                <div>
                    Order Time:
                </div>
                <div>
                    {{ this.getDate(created) }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white border-bottom-1">
                <div>
                    End Time:
                </div>
                <div>
                    {{this.getDate(strategy.active_until) }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white border-bottom-1">
                <div>
                    Estimated Earnings:
                </div>
                <div>
                    {{ strategy.earnings }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white border-bottom-1">
                <div>
                    Investment Amount:
                </div>
                <div>
                    {{ strategy.amount }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white">
                <div>
                    Order Status:
                </div>
                <div class="px-2">
                    <img class="working" style="width: 30px;" src="/images/coin-spin.svg" alt="logo">
                </div>
            </div>
        </div>
        <div class="card-background w-100 mt-3 py-2 relative position-relative">
            <div class="px-2 text-center text-white">
                <h6 class="label-border">Data Analysis</h6>
                <div id="text" class="code bg-fade-dark">
                </div>
            </div>
            <div v-if="showReward" class="reward-wrapper bg-fade-dark">
                Get Rewarded {{ reward.amount}} <img style="margin-top: -5px;" src="/images/Tether-USDT-icon.webp" width="20" alt=""/>
            </div>
            <div class="claim-reward-wrapper">
                <div :style="[this.loading ? {'opacity': '0.5'} : {}]" class="claim-reward-button d-flex justify-content-around flex-column align-items-center">
                    <div class="mx-2">
                        <div class="d-flex">
                            <div v-if="this.timer > 0" class="d-flex justify-content-center flex-column align-items-center claim-reward-countdown">
                                <div :style="[this.timer === 0 ? {'opacity': '0.5'} : {}]" class="timer d-flex justify-content-between" v-html="this.showCountDown(this.timer)"></div>
                            </div>
                            <div v-else class="d-flex justify-content-center flex-column align-items-center claim-reward-countdown">
                                <div :style="[this.timer === 0 ? {'opacity': '0.5'} : {}]" class="timer d-flex justify-content-between" v-html="this.showCountDown(this.timer)"></div>
                            </div>
                            <div v-if="this.timer <= 0" @click="claimReward" class="m-auto cursor-pointer claim-reward-icon" style="cursor: pointer">
                                <svg class="attention" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 5057 5057" width="25" height="25"><path fill="#ff6699" d="M588 2347l984 -309c246,244 584,394 957,394 373,0 711,-150 956,-394l985 309 -1941 609 -1941 -609zm-577 781l624 -653 1824 582 -624 658 -1824 -587zm5036 0l-625 -653 -1824 582 625 658 1824 -587zm-625 1342l0 -1033 -1149 370c-62,20 -126,3 -171,-44l-504 -531 0 1825 1824 -587zm-3787 0l0 -1033 1149 370c62,20 126,3 171,-44l504 -531 0 1825 -1824 -587z" class="color3a3b54 svgShape"></path><path fill="#43ffff" d="M2529 0c624,0 1131,506 1131,1131 0,625 -507,1131 -1131,1131 -625,0 -1131,-506 -1131,-1131 0,-625 506,-1131 1131,-1131zm-567 1736l213 0 0 194 189 0 0 -194 147 0 0 194 189 0 0 -194 141 0c179,0 326,-146 326,-325l0 0c0,-179 -147,-325 -326,-325l-27 0c154,0 280,-126 280,-280l0 0c0,-154 -126,-280 -280,-280l-114 0 0 -194 -189 0 0 194 -147 0 0 -194 -189 0 0 194 -213 0 0 199 187 0 0 813 -187 0 0 198zm428 -215l336 0c87,0 158,-71 158,-157l0 0c0,-87 -71,-158 -158,-158l-336 0 0 315zm0 -795l329 0c74,0 135,61 135,136l0 0c0,74 -61,136 -135,136l-329 0 0 -272z" class="color427db8 svgShape"></path><polygon fill="#43ffff" points="0 210 334 0 864 843 1093 699 1020 1463 301 1197 530 1053" class="color427db8 svgShape"></polygon><polygon fill="#43ffff" points="5057 210 4723 0 4193 843 3965 699 4037 1463 4757 1197 4528 1053" class="color427db8 svgShape"></polygon></svg>
                            </div>
                        </div>
                        <div v-if="this.timer > 0" class="text-center ">To Get Your {{ reward.amount }} <img style="margin-top: -5px;" src="/images/Tether-USDT-icon.webp" width="20" alt=""/></div>
                        <div v-else class="text-center">Click Gif Icon To Get Your <b>{{ reward.amount }} <img style="margin-top: -5px;" src="/images/Tether-USDT-icon.webp" width="20" alt=""/></b></div>

                    </div>

                    <!--            <progress-bar></progress-bar>-->
                    <!--            <img class="mx-2" style="width: 50px;height: 50px;border-radius: 50%;" src="/images/fire.jpeg" alt="company" />-->
                </div>
            </div>
        </div>

    </div>

</template>

<script>
import axios from "axios";
import moment from 'moment';

export default {
    name: "Active",
    props: ['strategy', 'created', 'reward', 'reward_amount'],
    data() {
        return {
            showReward: false,
            rates: null,
            i: 0,
            brCount: 0,
            text: "",
            moment: null,
            loading: false,
            timer: 0,
            timerStopped: 0
        };
    },
    methods: {
        async getRates() {
            await axios.get('/rates')
                .then((res) => {
                    console.log(res.data.rates);
                    this.rates = res.data.rates;
                })
                .catch((error) => {
                }).finally(() => {

                });
        },

        typing() {
            if (this.i < this.text.length) {
                if (this.text.charAt(this.i) === "-") {
                    this.brCount++
                    document.getElementById("text").innerHTML += "<br/>";
                }

                if (this.brCount === 16) {
                    document.getElementById("text").innerHTML = "";
                    this.brCount = 0
                }
                document.getElementById("text").innerHTML += this.text.charAt(this.i);

                this.i++;
                setTimeout(this.typing, 50);
            }
        },

        async getText() {
            await this.getRates()

            /*const keys = Object.keys(this.rates)
            for (let i=0; i<5; i++) {
                let rateKey = keys[i];
                if(this.rates[rateKey] !== 0){
                    this.rates[rateKey] += 0.1
                }

                this.text += ` -Scan Exchange -Buy ${rateKey} at ${this.rates[rateKey].toFixed(2)} , Selling ${rateKey} at ${this.getRandomFloat(0.01, 0.02, 2,  this.rates[rateKey])} ,`
            }*/
            for (let i=0; i<400; i++) {
                let rateKey = this.setRandomRate();
                // this following condition is for exclude USDT,BUSD,USDC rates

                if (rateKey !== 'USDT' && rateKey !== 'BUSD' && rateKey !== 'USDC'){
                    if(this.rates[rateKey] !== 0){
                        this.rates[rateKey] += 0.1
                    }
                    this.text += ` -Scan Exchange -Buy ${rateKey} at ${this.rates[rateKey].toFixed(2)} , Selling ${rateKey} at ${this.getRandomFloat(0.01, 0.02, 2,  this.rates[rateKey])} ,`
                }
            }

             this.typing()
        },

        getRandomFloat(min, max, decimals, value) {
            const str = (Math.random() * (max - min) + min);
            return (parseFloat(str) + value).toFixed(decimals);
        },
        getDate(date){
            let toDt = moment.utc(date).toDate();

            return moment(toDt).format('YYYY-MM-DD hh:mm:ss A')
        },
        setRandomRate() {
            const keys = Object.keys(this.rates)
            const randomIndex = Math.floor(Math.random() * keys.length);

            return keys[randomIndex]
        },
        decreseSeconds() {
            this.showCountDown();
            if(this.timer === 0) return
            this.timer -= 1;
        },
        showCountDown(seconds){
            if(seconds === 0) return `
                <div class="mx-1">
<!--                <span class="indicator">HH</span>:-->
                <span class="indicator">00H:</span></div>
                <div class="mx-1">
<!--                <span class="indicator">MM</span>:-->
                <span class="indicator">00M:</span></div>
                <div class="mx-1">
<!--                <span class="indicator">SS</span>:-->
                <span class="indicator">00S</span></div>
                `
            var days = Math.floor(seconds / (3600*24));
            seconds  -= days*3600*24;
            var hrs   = Math.floor(seconds / 3600);
            seconds  -= hrs*3600;
            var mnts = Math.floor(seconds / 60);
            seconds  -= mnts*60;
            seconds = Math.floor(seconds)

            if(days < 10) {
                days = "0"+days
            }
            if(hrs < 10) {
                hrs = "0"+ hrs
            }
            if(mnts < 10) {
                mnts = "0"+ mnts
            }
            if(seconds < 10) {
                seconds = "0"+ seconds
            }

            return `
                <div class="mx-1">
<!--                <span class="indicator">HH</span>:-->
                <span class="indicator">${hrs}H:</span></div>
                <div class="mx-1">
<!--                <span class="indicator">MM</span>:-->
                <span class="indicator">${mnts}M:</span></div>
                <div class="mx-1">
<!--                <span class="indicator">SS</span>:-->
                <span class="indicator">${seconds}S</span></div>
                `
        },
        claimReward() {
            if(this.timer > 0) return;
            if(this.loading) return
            this.loading = true;
            axios.post('/claim-reward')
                .then((res) => {
                    this.$toast.success(res.data.msg);

                    let end = moment.utc(res.data.reward.next_claim);
                    let now = moment().utc();

                    let seconds = Math.abs(now - end) / 1000;

                    this.startConfeti();
                    this.showReward = true;
                    this.timer = Math.floor(seconds);
                    this.loading = false;
                })
                .catch((error) => {
                    this.$toast.error(error.response.data.message);
                    this.loading = false;
                }).finally(() => {
            });
        },
        startConfeti() {
            var count = 200;
            var defaults = {
                origin: { y: 0.8 }
            };

            function fire(particleRatio, opts) {
                confetti(Object.assign({}, defaults, opts, {
                    particleCount: Math.floor(count * particleRatio)
                }));
            }

            fire(0.25, {
                spread: 26,
                startVelocity: 55,
            });
            fire(0.2, {
                spread: 60,
            });
            fire(0.35, {
                spread: 100,
                decay: 0.91,
                scalar: 0.8
            });
            fire(0.1, {
                spread: 120,
                startVelocity: 25,
                decay: 0.92,
                scalar: 1.2
            });
            fire(0.1, {
                spread: 120,
                startVelocity: 45,
            });
        }
    },
    created(){
        let end = moment.utc(this.reward.next_claim);
        let now = moment().utc();

        let seconds = now > end ? 0 : Math.abs(now - end) / 1000;

        this.timer = Math.floor(seconds);
        this.timerStopped = Math.floor(seconds);
    },
    watch: {
        timer: {
            handler(newTimer){
                if(newTimer > 0){
                    setTimeout(() => this.decreseSeconds() , 1000)
                }
            },
        },
    },
    mounted() {
        this.getText()
        this.moment = moment;
    }
}
</script>

<style scoped>
.bottom-line {
    border-bottom: 1px solid #675f5f;
}
.claim-reward-wrapper{
    position: absolute;
    top: 38px;
    right: 0;
    left: 0;
}
.code{
    height: 55vh;
}
#text{
    padding-top: 55px;
}
.indicator{
    font-size: 1.5rem !important;
}
.reward-wrapper{
    position: absolute;
    top: 100px;
    right: 130px;
    padding: 10px;
    font-size: 1rem;
    z-index: 99;
}
</style>
