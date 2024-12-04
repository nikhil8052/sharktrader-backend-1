<template>
    <div>
        <div class="d-flex justify-content-start">
            <div class="d-flex flex-column justify-content-start w-100">
<!--                <div class="text-center">
                    <img class="working mb-2" style="width: 30px;" src="/images/working.png" alt="logo">
                </div>-->
                <div class="text-left">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">{{ strategy.name}}</h6>
                        <h6 class="fw-bold ">
                            <span>{{ strategy.amount }}</span>
                            <img src="/images/Tether-USDT-icon.webp" width="15" alt="USDT">
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="timer-logo d-flex gap-1 mb-1">
<!--                            <svg focusable="false" aria-hidden="true" width="15" fill="#FFFFFF" viewBox="0 0 24 24" data-testid="AccessTimeIcon"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"></path><path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="25" height="25"><path fill="#f1b974" d="M12.82 18.62S25.06 7.32 37.79 8.44c0 0-3.28 4.7 0 6.23 1.24.52 6.6 1.55 5.42-5.53 0 0 13.26 3.17 19.76-8.62 0 0-.44 16.31-12.88 24.92 0 0 8.19.3 13.14-10.63 0 0 4.39 12.88-7.87 19.29-6.95 3.66-6.48 7.52.49 7.01-3.6 12.93-13.57 17.88-24.8 21.24L12.82 18.62z" class="colorf1b974 svgShape"></path><path fill="#d08230" d="M15.48 19.21c2.4-2.07 11.12-8.03 18.86-8.57-.25.97-.35 2.04-.07 3.07.36 1.33 1.25 2.36 2.58 2.98l.08.03c.63.27 1.72.55 2.9.55 1.83 0 3.34-.65 4.38-1.88.83-.98 1.29-2.27 1.38-3.85.21.01.44.01.67.01 3.82 0 8.66.05 13.7-4-1.11 4.87-4.91 11.74-11.13 16.04-.91.67-1.06.9-2.82 2.9.91.56 2.07 1.12 4.04 1.16h.11c.79 0 6.58-.21 11.56-6.18-.32 3.51-1.96 7.8-7.39 10.63-6.16 3.24-6.44 6.28-6.06 7.81.27 1.1 1.23 2.85 4.53 3.33-3.5 8.97-10.74 13.23-20.46 16.36L15.48 19.21z" class="colord08230 svgShape"></path><circle cx="23.77" cy="39.72" r="23.77" fill="#2e435a" class="color2e435a svgShape"></circle><circle cx="23.77" cy="39.72" r="19.72" fill="#eff3f5" transform="rotate(-45.001 23.77 39.716)" class="coloreff3f5 svgShape"></circle><path fill="#dededf" d="M43.49 39.72c0 10.89-8.83 19.72-19.72 19.72V20c10.89 0 19.72 8.83 19.72 19.72z" class="colordededf svgShape"></path><path fill="#445b69" d="M13.18 29.82c-.18 0-.35-.07-.49-.2l-1.93-1.93a.694.694 0 0 1 .98-.98l1.93 1.93c.27.27.27.71 0 .98-.14.13-.31.2-.49.2zM8.79 40.41H6.06c-.38 0-.69-.31-.69-.69s.31-.69.69-.69H8.8c.38 0 .69.31.69.69s-.31.69-.7.69zm2.46 12.52c-.18 0-.35-.07-.49-.2a.694.694 0 0 1 0-.98l1.93-1.93a.694.694 0 0 1 .98.98l-1.93 1.93c-.14.13-.32.2-.49.2zm25.04 0c-.18 0-.35-.07-.49-.2l-1.93-1.93a.694.694 0 0 1 .98-.98l1.93 1.93c.27.27.27.71 0 .98-.14.13-.31.2-.49.2zm5.19-12.52h-2.74c-.38 0-.69-.31-.69-.69s.31-.69.69-.69h2.74c.38 0 .69.31.69.69s-.31.69-.69.69zm-7.12-10.59c-.18 0-.35-.07-.49-.2a.694.694 0 0 1 0-.98l1.93-1.93a.694.694 0 0 1 .98.98l-1.93 1.93c-.14.13-.32.2-.49.2z" class="color445b69 svgShape"></path><path fill="#293b4e" d="M32.16 41.1h-8.39c-.76 0-1.38-.62-1.38-1.38 0-.76.62-1.38 1.38-1.38h8.39c.76 0 1.38.62 1.38 1.38 0 .76-.62 1.38-1.38 1.38z" class="color293b4e svgShape"></path><path fill="#324a5e" d="M23.77 40.58c-.35 0-.67-.21-.81-.55l-4.28-10.94c-.17-.44.05-.95.49-1.12.44-.17.95.05 1.12.49l4.28 10.94c.17.44-.05.95-.49 1.12-.1.04-.21.06-.31.06z" class="color324a5e svgShape"></path><path fill="#df4666" d="M24.3 39.33a.65.65 0 0 0-.92-.14l-11.55 8.44c-.29.21-.36.63-.14.92a.65.65 0 0 0 .92.14l11.55-8.44c.29-.21.35-.63.14-.92z" class="colordf4666 svgShape"></path><path fill="#445b69" d="M26.82 39.72a3.05 3.05 0 1 1-6.1 0 3.05 3.05 0 0 1 3.05-3.05 3.043 3.043 0 0 1 3.05 3.05z" class="color445b69 svgShape"></path><path fill="#bdbdbe" d="M43.49 39.72c0 .18 0 .36-.01.54-.3-10.63-9.01-19.14-19.71-19.14V20c10.89 0 19.72 8.83 19.72 19.72z" class="colorbdbdbe svgShape"></path><path fill="#c6c1c1" d="M23.77 20v1.12c-10.71 0-19.42 8.52-19.71 19.16-.01-.19-.01-.37-.01-.56C4.05 28.83 12.87 20 23.77 20z" class="colorc6c1c1 svgShape"></path><path fill="#445b69" d="M23.08 22.01v2.74c0 .38.31.69.69.69v-4.12c-.38 0-.69.31-.69.69z" class="color445b69 svgShape"></path><path fill="#293b4e" d="M24.46 24.74V22c0-.38-.31-.69-.69-.69v4.12c.38.01.69-.3.69-.69z" class="color293b4e svgShape"></path><path fill="#445b69" d="M23.08 54.69v2.74c0 .38.31.69.69.69V54c-.38 0-.69.31-.69.69z" class="color445b69 svgShape"></path><path fill="#293b4e" d="M24.46 57.43v-2.74c0-.38-.31-.69-.69-.69v4.12c.38 0 .69-.31.69-.69z" class="color293b4e svgShape"></path></svg>
                            <div class="timer timer-strategy d-flex justify-content-between" v-html="this.showCountDown(this.timer)"></div>
                        </div>
                        <ul class="mb-0 strategy-list">
                            <li class="strategy-list-item">
                                <img class="working mb-2" style="width: 30px;" src="/images/coin-spin.svg" alt="logo">
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
<!--            <svg width="150" height="150" viewBox="0 0 40 40" class="donut">
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
            </svg>-->
        </div>
        <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="`${Math.min(this.percentage, 100)}`"
                 class="progress-bar" role="progressbar" :style="{  width: Math.min(this.percentage, 100) + '%'}"></div>
            <span class="progress-bar-value">{{ Math.min(this.percentage, 100) }}%</span>
        </div>
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
