<template>
    <div class="progress-bar">
        <div class="p-3">
            <div class="progress-info">
                <carousel :items-to-show="settings.itemsToShow" :autoplay="4000" :wrap-around="true">
                    <slide v-for="slide in slides" :key="slide">
                        <span class="textttttt">User {{this.generateRandomString()}}**** earned {{ this.generateRandomInt()}} USDT</span>
                    </slide>
                </carousel>
            </div>
        </div>
    </div>
</template>

<script>
// If you are using PurgeCSS, make sure to whitelist the carousel CSS classes
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default {
    name: "ProgressBar",
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    setup() {
        return {
            // carousel settings
            settings: {
                itemsToShow: 1,
                snapAlign: "center"
            },
            slides: [
                "User **** earned 54usdt",
                "User **** earned 54usdt",
                "User **** earned 54usdt",
                "User **** earned 54usdt",
            ],
            // breakpoints are mobile first
            // any settings not specified will fallback to the carousel settings
            breakpoints: {
                // 700px and up
                700: {
                    itemsToShow: 3.5,
                    snapAlign: "center"
                },
                // 1024 and up
                1024: {
                    itemsToShow: 5,
                    snapAlign: "start"
                }
            }
        };
    },
    methods: {
        generateRandomString() {
            return Math.random().toString(36).slice(2, 5);
        },
        generateRandomInt(){
            const str = (Math.random() * (1.5 - 300) + 300).toFixed(3);
            return parseFloat(str);
        }
    }
}
</script>

<style scoped>

.textttttt {
    font-style: italic;
    font-size: 12px;
    color: #FABE2D !important;
    //padding-right: 10px;
}
.progress-bar {
    width: 100%;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
}


.progress-info{
    width: 100%;
    font-size:13px;
}



</style>
