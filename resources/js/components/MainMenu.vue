<style>
.carousel{
    border-radius: 15px;
}
.vc-header .vc-title{
    background-color: #4effff !important;
    padding: 0px 11px;
    clip-path: polygon(12px 0, calc(100% - 12px) 0%, 100% 12px, 100% calc(100% - 12px), calc(100% - 12px) 100%, 12px 100%, 0% calc(100% - 12px), 0% 12px);
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


.vc-dot{
    background-color: #43FFFF !important;
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
#checkins > div > div.vc-pane-layout > div, .vc-header .vc-arrow{
    background-color: #13738b !important;
    background-image: radial-gradient(transparent, rgb(0 0 0 / 80%)), linear-gradient(to bottom, #17697e, calc(12.5% - 1px), #12748d, #0e8390 calc(12.5% + 1px) 50%, #107f8b 50% calc(87.5% - 1px), #217b99, #12748d calc(87.5% + 1px));
}
.polygon-container a{
    min-width: unset;
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
    <slider-main class="my-2"></slider-main>

    <div class="notice border-gradient border-gradient-blue border-y">
        <div class="icon">
            <img width="28" alt="notice" src="/images/promotion.png">
        </div>
        <div class="text">USDT-ERC20 recharge network has been launched.</div>
    </div>

    <div class="menu-buttons-container">
        <div class="glow-element"></div>
        <div class="menu-buttons row">
            <div class="polygon-container text-center">
                <a href="/list-strategies" class="">
                    <div class="box-polygon box">
                        <img src="/images/strategy-development.png" alt="Strategy" width="40" height="40">
                    </div>
                    <div class="text-white">Strategy</div>
                </a>
                <a href="/spider-web">
                    <div class="box-polygon box">
                        <img src="/images/spider.svg" alt="SpiderWeb" width="70" style="width: 70px">
                    </div>
                    <div class="text-white">SpiderWeb</div>
                </a>
                <a href="/quant-trade">
                    <div class="box-polygon box">
                        <img src="/images/stock-market.png" alt="Quant Trade" width="40" height="40">
                    </div>
                    <div class="text-white">Quant Trade</div>
                </a>
                
            </div>
        </div>
        <div class="menu-buttons row">
            <div class="polygon-container text-center">
				<a href="/my-strategy">
                    <div class="box-polygon box">
                        <img src="/images/target.png" alt="My Strategy" width="40" height="40">
                    </div>
                    <div class="text-white">My Strategy</div>
                </a>
                <a href="/media-related">
                    <div class="box-polygon box">
                        <img src="/images/social.png" alt="Media" width="40" height="40">
                    </div>
                    <div class="text-white">Media</div>
                </a>
                <a href="#sign-in-button">
                    <div class="box-polygon box">
                        <img src="/images/schedule.png" alt="Sign-in" width="40" height="40">
                    </div>
                    <div class="text-white">Sign-in</div>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                <a href="/faq" class="text-decoration-none d-flex justify-content-center">
                    <button class="button-13" role="button">
                    <div class="text">
                        <img width="35" src="/images/faqs_2.png" alt="">
                        <div>
                            FAQdd
                        </div>
                    </div>
                    <span class="button-13-background blue"></span>
                    <span class="button-13-border"></span>
                    <!-- mask-border fallback -->
                    <svg style="position: absolute;" width="0" height="0">
                        <filter id="remove-black-button-13" color-interpolation-filters="sRGB">
                            <feColorMatrix type="matrix" values="1 0 0 0 0
0 1 0 0 0
0 0 1 0 0
-1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                            <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>
                        </filter>
                    </svg>
                </button>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="/company" class="text-decoration-none d-flex justify-content-center">
                    <button class="button-13" role="button">
                        <div class="text">
                            <img width="35" src="/images/office-building.png" alt="">
                            <div>
                                Company
                            </div>
                        </div>
                        <span class="button-13-background blue"></span>
                        <span class="button-13-border"></span>
                        <!-- mask-border fallback -->
                        <svg style="position: absolute;" width="0" height="0">
                            <filter id="remove-black-button-13" color-interpolation-filters="sRGB">
                                <feColorMatrix type="matrix" values="1 0 0 0 0
0 1 0 0 0
0 0 1 0 0
-1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                                <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>
                            </filter>
                        </svg>
                    </button>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="/invite_users" class="text-decoration-none d-flex justify-content-center">
                    <button class="button-13" role="button">
                        <div class="text">
                            <img width="35" src="/images/inheritance.png" alt="">
                            <div>
                                Invite
                            </div>
                        </div>
                        <span class="button-13-background blue"></span>
                        <span class="button-13-border"></span>
                        <!-- mask-border fallback -->
                        <svg style="position: absolute;" width="0" height="0">
                            <filter id="remove-black-button-13" color-interpolation-filters="sRGB">
                                <feColorMatrix type="matrix" values="1 0 0 0 0
0 1 0 0 0
0 0 1 0 0
-1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                                <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>
                            </filter>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="user-menus d-flex justify-content-between flex-column px-2 mt-2 gap-1" style="padding-left: 0 !important; padding-right: 0 !important;">
        <a href="/user-tutorial" class="button-14 mb-0" role="button">
            <div class="text row" style="font-size: 1.4rem; margin: auto">
                <div class="col-2">
                    <img width="35" src="/images/video-lesson-blue.png" alt="Tutorial">
                </div>
                <div class="col-8">Tutorial</div>
                <div class="col-2">
                    <div class="arrow-next">
                        <svg v-if="loading" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block;" width="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="30" cy="50" fill="#ffffff" r="20">
                                <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30" begin="-0.5s"></animate>
                            </circle>
                            <circle cx="70" cy="50" fill="#4effff" r="20">
                                <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30" begin="0s"></animate>
                            </circle>
                            <circle cx="30" cy="50" fill="#ffffff" r="20">
                                <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30" begin="-0.5s"></animate>
                                <animate attributeName="fill-opacity" values="0;0;1;1" calcMode="discrete" keyTimes="0;0.499;0.5;1" dur="1s" repeatCount="indefinite"></animate>
                            </circle>
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
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
        </a>
    </div>

    <div class="calendar-wrapper" style="margin: 0px 10px;">
        <calendar id="checkins"
                  class="mb-3"
                  :attributes="checkins"
                  :columns="columns"
                  :expanded="expanded"
                  :max-date="maxDate"
                  :min-date="minDate"
                  :rows="rows"
                  :is-dark="true"
        />
        <div id="sign-in-button" class="user-menus d-flex justify-content-between flex-column px-2 mt-2 gap-1" style="padding-left: 0 !important; padding-right: 0 !important;">
            <a href="javascript:void(0);" class="button-14 mb-0" role="button" @click.prevent="checkingNow" style="border-width: 0">
                <div class="text row" style="font-size: 1.4rem">
                    <div class="col-10">Check-In Now</div>
                    <div class="col-2">
                        <div class="arrow-next">
                            <svg v-if="loading" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block;" width="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <circle cx="30" cy="50" fill="#ffffff" r="20">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30" begin="-0.5s"></animate>
                                </circle>
                                <circle cx="70" cy="50" fill="#4effff" r="20">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30" begin="0s"></animate>
                                </circle>
                                <circle cx="30" cy="50" fill="#ffffff" r="20">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="30;70;30" begin="-0.5s"></animate>
                                    <animate attributeName="fill-opacity" values="0;0;1;1" calcMode="discrete" keyTimes="0;0.499;0.5;1" dur="1s" repeatCount="indefinite"></animate>
                                </circle>
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                      d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                      clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
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
            </a>
        </div>
    </div>

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
import { ref } from 'vue';
/*const attributes = ref([
    {
        highlight: 'blue',
        dates: [{ start: new Date(2024, 1, 7), span: 3 }],
    },{
        highlight: 'blue',
        dates: [{ start: new Date(2024, 1, 12), span: 3 }],
    },
]);*/
export default {
    name: "MainMenu",
    components: {
        Calendar,
        DatePicker,
    },
    props: {
        reward: Object,
        reward_amount: String,
        checkins: Object
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
        checkingNow() {
            this.loading = true;
            axios.post('/checkin')
                .then((res) => {
                    this.$toast.success(res.data.message);
                    if (res.data.status === true){
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                })
                .catch((error) => {
                    this.$toast.error(error.response.data.message);
                    this.loading = false;
                }).finally(() => {
                    this.loading = false;
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

