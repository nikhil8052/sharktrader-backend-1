<template>
    <div>
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column justify-content-start w-100">
<!--                <div class="text-center">
                    <img class="working mb-2" style="width: 30px;" src="/images/working.png" alt="logo">
                </div>-->
                <div class="text-left">
                    <div class="d-flex justify-content-between">
                        <h6>{{ strategy.name}}</h6>
                        <h6 class="text-danger fw-bold ">{{ strategy.amount }}</h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="timer-logo d-flex gap-1 mb-1">
                            <svg focusable="false" aria-hidden="true" width="15" fill="#FFFFFF" viewBox="0 0 24 24" data-testid="AccessTimeIcon"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"></path><path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>
                            <div class="timer timer-strategy d-flex justify-content-between" v-html="this.showCountDown(this.timer)"></div>
                        </div>
                        <ul class="mb-0 strategy-list">
                            <li class="strategy-list-item">
                                <img class="working mb-2" style="width: 30px;" src="/images/working.png" alt="logo">
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <svg width="150" height="150" viewBox="0 0 40 40" class="donut">
                <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5">
                </circle>
                <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent"
                    stroke-width="3.5"
                    :stroke-dasharray="` ${this.percentage} ${100 - this.percentage}`"
                    stroke-dashoffset="25"></circle>
                <g class="donut-text donut-text-1">

                    <text y="50%" transform="translate(0, 2)">
                        <tspan x="50%" text-anchor="middle" class="donut-percent">{{ this.percentage }}%</tspan>
                    </text>
                </g>
            </svg>
        </div>
<!--        <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="`${Math.min(this.percentage, 100)}`"
                 class="progress-bar" role="progressbar" :style="{  width: Math.min(this.percentage, 100) + '%', backgroundColor: '#1FFD96'}"></div>
            <span class="progress-bar-value">{{ Math.min(this.percentage, 100) }}%</span>
        </div>-->
<!--        <hr>
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <h5>{{ this.winning }} <img style="margin-top: -5px;" src="/images/Tether-USDT-icon.webp" width="25" alt=""></h5>
                <p><i>Current Earnings</i></p>
            </div>
            <div>
                <div class="earning-loader">

                </div>
            </div>
            <div class="text-center">
                <h5>{{ strategy.earnings }} <img style="margin-top: -5px;" src="/images/Tether-USDT-icon.webp" width="25" alt=""></h5>
                <p><i>Estimated Earnings</i></p>
            </div>
        </div>-->
    </div>
</template>


<script>
import moment, { min } from "moment";
export default {
    name: "WorkingStrategy",
    props: ["strategy"],
    data() {
        return {
            timer: 0,
            percentage: 0,
            winning: 0
        };
    },
    mounted(){

        let end = moment.utc(this.strategy.active_until);
        let now = moment().utc();

        let seconds = now > end ? 0 : Math.abs(now - end) / 1000;

        this.timer = seconds;

        this.percentage = Math.min( this.calculatePercentage(this.strategy), 100);
        this.winning = (this.percentage * (this.strategy.earnings / 100)).toFixed(2)
        this.showCountDown(seconds)
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
        showCountDown(seconds){
            if(Math.floor(seconds) === 0) return `
                <div>
<!--                <span class="indicator">DD</span>:-->
                <span class="indicator">00D/</span></div>
                <div>
<!--                <span class="indicator">HH</span>:-->
                <span class="indicator">00H/</span></div>
                <div>
<!--                <span class="indicator">MM</span>:-->
                <span class="indicator">00M/</span></div>
                <div>
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
                <div>
<!--                <span class="indicator">DD</span>:-->
                <span class="indicator">${days}D/</span></div>
                <div>
<!--                <span class="indicator">HH</span>:-->
                <span class="indicator">${hrs}H/</span></div>
                <div>
<!--                <span class="indicator">MM</span>:-->
                <span class="indicator">${mnts}M/</span></div>
                <div>
<!--                <span class="indicator">SS</span>:-->
                <span class="indicator">${seconds}S</span></div>
                `
        },
        calculatePercentage(strategy) {
            let start = moment.utc(strategy.created_at);
            let end = moment.utc(strategy.active_until);
            let today = moment().utc();

            let timeBetweenStartAndEnd = end - start;
            let timeBetweenStartAndToday = today - start;

            return Math.round(
                (timeBetweenStartAndToday / timeBetweenStartAndEnd) * 100
            );
        },
        extractTimeAndSecconds() {
            let secs = this.timer > 60 ? this.timer - 60 : this.timer;
            if (secs == 60)
                secs = 0
            let mins = Math.floor(this.timer / 60);

            return (mins < 10 ? '0' + mins : mins) + ":" + (secs < 10 ? '0' + secs : secs)
        },
        decreseSecconds() {
            if(this.percentage < 100){
                this.percentage = this.calculatePercentage(this.strategy);
            } else {
                this.percentage = 100;
            }
            // if(Math.floor(this.winning) === Math.floor(this.strategy.earnings)){
            //     this.winning = this.strategy.earnings
            // } else {
                this.winning = (this.percentage * (this.strategy.earnings / 100)).toFixed(2)
            // }
            if(this.timer === 0) {
                this.timer = 0;
                return
            }
            this.timer -= 1;
        }
    },
};
</script>

<style >

.earning-loader {
    width: 50px;background-image: url("/images/loaders.gif");height: 50px;background-position: 72% 25%;background-size: 674%;border-radius: 10px;
}

.animated-progress {
    width: 100%;
    height: 22px;
    border-radius: 25px;
    border: 1px solid black;
    background: black;
    margin-top: 10px;
    overflow: hidden;
    position: relative;
}

.animated-progress span {
    height: 100%;
    display: block;
    color: rgb(255, 251, 251);
    line-height: 20px;
    position: absolute;
    text-align: center;
    padding-right: 5px;
}

.progress-green span {
    background-color: green;
}
span.progress-bar-value {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-weight: bold;
}
.svg-item {
    width: 100%;
    font-size: 16px;
    margin: 0 auto;
    animation: donutfade 1s;
}

@keyframes donutfade {

    /* this applies to the whole svg item wrapper */
    0% {
        opacity: .2;
    }

    100% {
        opacity: 1;
    }
}

@media (min-width: 992px) {
    .svg-item {
        width: 80%;
    }
}

.donut-ring {
    stroke: #e3e3e3;
}

.donut-segment {
    transform-origin: center;
    stroke: #FF6200;
}

.donut-segment-2 {
    stroke: #74b986;
    transition: ease-in-out;
}

.donut-segment-3 {
    stroke: #d9e021;
    animation: donut2 3s;
}

.donut-segment-4 {
    stroke: #ed1e79;
    animation: donut3 3s;
}

.segment-1 {
    fill: #ccc;
}

.segment-2 {
    fill: rgb(48, 159, 61);
}

.segment-3 {
    fill: #d9e021;
}

.segment-4 {
    fill: #ed1e79;
}

.donut-percent {
    animation: donutfadelong 1s;
}

@keyframes donutfadelong {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

@keyframes donut1 {
    0% {
        stroke-dasharray: 0, 100;
    }

    100% {
        stroke-dasharray: 69, 31;
    }
}

@keyframes donut2 {
    0% {
        stroke-dasharray: 0, 100;
    }

    100% {
        stroke-dasharray: 30, 70;
    }
}

@keyframes donut3 {
    0% {
        stroke-dasharray: 0, 100;
    }

    100% {
        stroke-dasharray: 1, 99;
    }
}

.donut-text {
    font-family: "Khalid", Helvetica, sans-serif;
    fill: #FF6200;
}

.donut-text-1 {
    fill: #74b986;
}

.donut-text-2 {
    fill: #d9e021;
}

.donut-text-3 {
    fill: #ed1e79;
}

.donut-label {
    font-size: 0.28em;
    font-weight: 700;
    line-height: 1;
    fill: #000;
    transform: translateY(0.25em);
}

.donut-percent {
    font-size: 0.5em;
    line-height: 1;
    transform: translateY(0.5em);
    font-weight: bold;
}

.donut-data {
    font-size: 0.12em;
    line-height: 1;
    transform: translateY(0.5em);
    text-align: center;
    text-anchor: middle;
    color: #666;
    fill: #666;
    animation: donutfadelong 1s;
}

</style>
