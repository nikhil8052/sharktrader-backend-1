<template>
  <div class="container ">
    <div class="buttonsSelection">
      <div :class="this.working && 'active'" @click="toogle('working')">
        Working
      </div>
      <div :class="this.finished && 'active'"  @click="toogle('finished')">
        Finished
      </div>
    </div>
    <working-strategy
      :workingStrategies="this.$props.working"
      v-if="working"
    ></working-strategy>
    <finished-strategy
      :finishedStrategies="this.$props.finished"
      v-if="finished"
    ></finished-strategy>
  </div>
</template>

<script>
import WorkingStrategy from "./WorkingStrategy";
import FinishedStrategy from "./FinishedStrategy";

export default {
  name: "Shark",
  props: ["working", "finished"],
  components: {
    WorkingStrategy,
    FinishedStrategy,
  },
  data() {
    return {
      working: true,
      finished: false,
    };
  },
  methods: {
    toogle(status) {
      if (status === "working") {
        this.working = true;
        this.finished = false;
      } else {
        this.working = false;
        this.finished = true;
      }
    },
  },
  created() {
    // props are exposed on `this`
  },
};
</script>

<style scoped>


.active {
    background-color: #424242;
    border-radius: 25px;
    font-weight: bold;
}
.buttonsSelection>div {
    height: 38px;
    line-height: 38px;
    width: 50%;
    cursor:pointer;
    display: inline-block;
    border-radius: 25px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    color: #10cef2;
}
.buttonsSelection{
    flex-wrap: wrap;
    height: 40px;
    margin-top: 25px;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 25px;
    box-shadow:rgba(0, 0, 0, 0.3) 0px 0px 12px 0px;
}
.button-select {
    font-size: 10px;
}
</style>
