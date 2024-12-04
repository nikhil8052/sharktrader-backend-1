<template>
    <carousel :items-to-show="settings.itemsToShow" :autoplay="5000" :wrap-around="true">
        <slide v-for="slide in slides" :key="slide">
                <img class="slideIMG" :src="slide" alt="s1">
        </slide>

        <template #addons>
            <navigation />
            <pagination />
        </template>
    </carousel>
</template>

<script>
// If you are using PurgeCSS, make sure to whitelist the carousel CSS classes
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default {
    name: 'App',
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
                snapAlign: "center",
                dots: true
            },
            slides: [
                "/images/banners/slide_2.png",
                "/images/banners/slide_1.jpg",
                "/images/banners/slide_3.png",
                // "/images/slide_3.jpg",
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
    }
}
</script>
<style>
.slideIMG{
    border-radius: 15px;
    width: 100%;
    padding: 0;
}
.carousel__item {
    min-height: 200px;
    width: 100%;
    background-color: #642afb;
    color: white;
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}


svg.carousel__icon {
    display: none;
}

</style>
