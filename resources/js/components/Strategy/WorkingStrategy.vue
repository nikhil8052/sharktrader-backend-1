<template>
  <div v-if="this.workingStrategies.length !== 0" class="">
    <a
      :key="strategy.id"
      v-for="strategy in this.workingStrategies"
      :href="/my-strategy/ + strategy.order_id"
      class="strategy-section w-100 d-flex mt-3 justify-content-between align-content-center align-content-center  text-decoration-none flex-column"
    >
      <active-working-strategy :strategy="{...strategy}"></active-working-strategy>
    </a>
  </div>
  <div v-else class="card-background w-100 mt-3">
<!--    <div class="text-center">
      <img
        style="width: 170px"
        src="/images/no-data.png"
        alt="no-data"
      />
      <div class="text-white">No data yet</div>
    </div>-->
  </div>
</template>

<script>
export default {
  name: "WorkingStrategy",
  props: ["workingStrategies"],
};
</script>

<style scoped>
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

.segment-1{fill:#ccc;}
.segment-2{fill:rgb(48, 159, 61);}
.segment-3{fill:#d9e021;}
.segment-4{fill:#ed1e79;}

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

@keyframes donut3{
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
    color:#666;
    fill: #666;
    animation: donutfadelong 1s;
}


</style>
