<style>
.carousel{
    border-radius: 15px;
}
.vc-header .vc-title{
    background-color: #1e293b !important;
}

.carousel .carousel__viewport .carousel__track{
    border-radius: 15px;
}

.carousel .carousel__viewport .carousel__track .carousel__slide img {
    border-radius: 15px;
}

.claim-reward-wrapper {
    margin: 20px 0;
    border-radius: 15px;
    background: url("/images/claim-reward1.png") no-repeat center;
    background-size: cover;
    min-height: 350px;
    height: 350px;
}

.claim-reward-icon {
//position: absolute;
//top: 0;
//left: 50%;
//transform: translateX(-50%);
}


.claim-reward-button {
    color: white;
    cursor: pointer;
    transition: all 250ms;
    font-size: 12px;
    touch-action: manipulation;
    border-radius: 15px;
    box-shadow: rgb(0, 0, 0, 0.3) 0px 0px 12px 0px;
    padding: 15px 0;
    height: inherit;
    position: relative;
    background-color: rgba(0,0,0, 0.5)
}
.claim-reward-countdown {
    color: #FABE2D;
}
strong {
    line-height: 32px;
}




.main-menu {
    color: #3a3831;
}

.menu-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    align-content: center;
    color: #3a3831;
    gap: 2px;
}

.menu-buttons {
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    flex-wrap: wrap;
    //background: no-repeat rgb(44, 44, 44);
    padding: 20px 0;
    width: 100%;
    margin: 0 auto !important;
}

@media (max-width: 350px) {
    .box {
        width: 80px !important;
        font-size: 12px;
    }
}

@media (max-width: 315px) {
    .menu-buttons {
        gap: 5px;
    }

    .main-button {
        width: 50px;
        font-size: 8px;
        margin-top: 10px;
        height: 80px;
    }
}

.card {
    width: 100%;
    height: 70px;
    /* background: #313131; */
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    color: #3a3831;
    transition: 0.2s ease-in-out;
}

.img {
    height: 50%;
    position: absolute;
    transition: 0.2s ease-in-out;
    z-index: 1;
}

.textBox {
    opacity: 0;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 15px;
    transition: 0.2s ease-in-out;
    z-index: 2;
}

.textBox>.text {
    font-weight: bold;
}

.textBox>.head {
    font-size: 20px;
}

.textBox>.price {
    font-size: 17px;
}

.textBox>span {
    font-size: 12px;
    color: lightgrey;
}

.card:hover>.textBox {
    opacity: 1;
}

.card:hover>.img {
    height: 65%;
    filter: blur(7px);
    animation: anim 3s infinite;
}

@keyframes anim {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-20px);
    }

    100% {
        transform: translateY(0);
    }
}

.card:hover {
    transform: scale(1.04);
}


.card-helpers {
    position: relative;
    font-family: 'Khalid',sans-serif;
    text-decoration: none;
    color: #3a3831;
}

.card-helpers::before,
.card-helpers::after {
    content: "";
    /* background-color: #fab5704c; */
    position: absolute;
}

.card-helpers::before {
    border-radius: 50%;
    width: 4rem;
    height: 4rem;
    top: 30%;
    right: 7%;
}

/*
.card-helpers::after {
    content: "";
    position: absolute;
    height: 3rem;
    top: 8%;
    right: 5%;
    border: 1px solid;
} */

.card-helpers .box {
    width: 6.875em;
    height: 7.875em;
    padding: 1rem;
    /* background-color: rgba(255, 255, 255, 0.074);
    border: 1px solid rgba(255, 255, 255, 0.222); */
    -webkit-backdrop-filter: blur(20px);
    backdrop-filter: blur(20px);
    border-radius: .7rem;
    transition: all ease .3s;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    align-content: center;
    align-items: center;
}

.card-helpers .box {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-helpers .box .title {
    font-size: 0.5rem;
    font-weight: 500;
    letter-spacing: .1em
}

.card-helpers .box div strong {
    display: block;
    margin-bottom: .5rem;
}

.card-helpers .box div p {
    margin: 0;
    font-size: .9em;
    font-weight: 300;
    letter-spacing: .1em;
}

.card-helpers .box div span {
    font-size: .7rem;
    font-weight: 300;
}

.card-helpers .box div span:nth-child(3) {
    font-weight: 500;
    margin-right: .2rem;
}

.card-helpers .box:hover {
    /* box-shadow: 0px 0px 20px 1px #ffbb763f;
    border: 1px solid rgba(255, 255, 255, 0.454); */
}</style>
<template>
    <slider-main class="mt-3"></slider-main>

    <div class="main-menu d-flex justify-content-around my-3">
        <div class="neon-border-container">
            <div class="neon-border">
                <span></span>
                <h2>
                    <a href="/list-strategies" class="text-white">Strategy</a>
                </h2>
            </div>
            <div class="border-blur"></div>
        </div>
        <div class="neon-border-container">
            <div class="neon-border">
                <span></span>
                <h2>
                    <a href="/eternity-ai" class="text-white">MajesticAi</a>
                </h2>
            </div>
            <div class="border-blur"></div>
        </div>
        <div class="neon-border-container">
            <div class="neon-border">
                <span></span>
                <h2>
                    <a href="/quant-trade" class="text-white">Quant Trade</a>
                </h2>
            </div>
            <div class="border-blur"></div>
        </div>
        <div class="neon-border-container">
            <div class="neon-border">
                <span></span>
                <h2>
                    <a href="/my-strategy" class="text-white">My Strategy</a>
                </h2>
            </div>
            <div class="border-blur"></div>
        </div>
    </div>
<!--    <div class="main-menu">
        <div class="menu-buttons">
            <a href="/list-strategies" class="main-button pt-1" style="background: url(/images/strategy.png)">
                <div class="text-white">Strategy</div>
            </a>
            <a href="/eternity-ai" class="main-button pt-1" style="background: url(/images/panther.png)">
                <div class="text-white">MajesticAi</div>
            </a>
            <a href="/quant-trade" class="main-button pt-1" style="background: url(/images/quant-trade.png)">
                <div class="text-white">Quant Trade</div>
            </a>
            <a href="/my-strategy" class="main-button pt-1" style="background: url(/images/my-strategy-1.png)">
                <div class="text-white">My Strategy</div>
            </a>
        </div>
    </div>-->


    <div class="menu-buttons-2">
       
        <a href="/faq" class="main-button-2 d3-button b00">
                <div class="wallet-icons">
                    <img width="30" src="/images/faq_2.png" alt="">
                </div>
            <div class="text-white">FAQss</div>
        </a>
        <a href="/company" class="main-button-2 d3-button b01">
                <div class="wallet-icons">
                    <img width="30" src="/images/company_2.png" alt="">
                </div>
            <div class="text-white">Company</div>
        </a>
        <a href="/invite_users" class="main-button-2 d3-button b01">
                <div class="wallet-icons">
                    <img width="30" src="/images/add-friend.png" alt="">
                </div>
            <div class="text-white">Invite</div>
        </a>
        <a href="/user-tutorial" class="main-button-2 d3-button b01">
            <div>
                <img class="wallet-icons" width="30" src="/images/video-lesson.png" alt="tutorial">
            </div>
            <div class="text-white">
                Tutorial
            </div>
        </a>
    </div>
<!--    <div class="menu-buttons">
        <a href="/faq" class="main-button pt-1">
                <div class="wallet-icons">
                    <img width="30" src="/images/faq.png" alt="">
                </div>
            <div class="text-white">FAQ</div>
        </a>
        <a href="/company" class="main-button pt-1">
                <div class="wallet-icons">
                    <img width="30" src="/images/office.png" alt="">
                </div>
            <div class="text-white">Company</div>
        </a>
        <a href="/invite_users" class="main-button pt-1">
                <div class="wallet-icons">
                    <img width="30" src="/images/support.png" alt="">
                </div>
            <div class="text-white">Invite</div>
        </a>
        <a href="/user-tutorial" class="main-button pt-1">
            <div>
                <img class="wallet-icons" width="30" src="/images/tutorial1.png" alt="tutorial">
            </div>
            <div class="text-white">
                Tutorial
            </div>
        </a>
    </div>-->

    <div class="calendar-wrapper">
        <calendar id="yearly-holidays"
                  :attributes="holidays"
                  :columns="columns"
                  :expanded="expanded"
                  :max-date="maxDate"
                  :min-date="minDate"
                  :rows="rows"
                  :is-dark="true"
        />
    </div>
<!--    <div class="claim-reward-wrapper">
        <div @click="claimReward" :style="[this.loading ? {'opacity': '0.5'} : {}]" class="claim-reward-button d-flex justify-content-around flex-column align-items-center">

            <div class="mx-2">
                <div v-if="this.timer > 0" class="d-flex justify-content-center flex-column align-items-center claim-reward-countdown">
                    <div class="claim-reward-icon p-2">
                        <img v-if="!this.reward.is_locked" style="width: 30px;" class="attention" src="/images/troph.png" alt="campaign">
                        <img v-else style="width: 30px;" class="attention" src="/images/padlock.png" alt="campaign">
                    </div>
                    <span v-if="!this.reward.is_locked" class="m-0"><b>Next reward in:</b></span>
                    <span v-else class="m-0"><b>Start trading with at least $10 to unlock rewards!</b></span>
                    <div v-if="!this.reward.is_locked" :style="[this.timer === 0 ? {'opacity': '0.5'} : {}]" class="timer d-flex justify-content-between" v-html="this.showCountDown(this.timer)"></div>
                    <div v-else style="opacity:0.5" class="timer d-flex justify-content-between" v-html="this.showCountDown(this.timerStopped)"></div>
                    <span class="mx-2">Get <b>{{ reward_amount }}$</b> as a reward! <img style="margin-top: -5px;" src="/images/Tether-USDT-icon.webp" width="20" alt=""/></span>
                </div>
                <div v-else class="d-flex justify-content-center flex-column align-items-center claim-reward-countdown">
                    <div class="claim-reward-icon p-2">
                        <img style="width: 30px;" class="attention" src="/images/troph.png" alt="campaign">
                    </div>
                    <span class="m-0 mb-2"><b>Your reward is ready!</b></span>
                    <div :style="[this.timer === 0 ? {'opacity': '0.5'} : {}]" class="timer d-flex justify-content-between" v-html="this.showCountDown(this.timer)"></div>
                    <span class="m-0 mb-2 mx-2">Get <b>{{ reward_amount }}$</b> as a reward! <img style="margin-top: -5px;" src="/images/Tether-USDT-icon.webp" width="20" alt=""/></span>
                </div>


            </div>

&lt;!&ndash;            <progress-bar></progress-bar>&ndash;&gt;
            &lt;!&ndash;            <img class="mx-2" style="width: 50px;height: 50px;border-radius: 50%;" src="/images/fire.jpeg" alt="company" />&ndash;&gt;
        </div>
    </div>-->
</template>
<script setup>
import {useScreens} from 'vue-screen-utils';
const {mapCurrent} = useScreens({
    xs: '0px',
    sm: '640px',
    md: '768px',
    lg: '1024px',
});
const columns = mapCurrent({lg: 1}, 1);
const rows = mapCurrent({lg: 1}, 1);
const expanded = mapCurrent({lg: true}, true);
</script>
<script>
import moment from "moment";
import {Calendar, DatePicker} from 'v-calendar';
import 'v-calendar/dist/style.css'

export default {
    name: "MainMenu",
    components: {
        Calendar,
        DatePicker,
    },
    props: {
        reward: Object,
        reward_amount: String,
        holidays: Object
    },
    data(){
        return {
            loading: false,
            timer: 0,
            timerStopped: 0
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
					setTimeout(() => this.decreseSecconds() , 1000)
				}
			},
		},
	},
    methods: {
        decreseSecconds() {
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

                    this.startConfeti()
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
    computed: {
        minDate() {
            return new Date(new Date().getFullYear(), 0, 1);
        },
        maxDate() {
            return new Date(new Date().getFullYear(), 11, 31);
        }
    }
}
</script>

