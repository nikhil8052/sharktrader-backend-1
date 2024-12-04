<template>
  <div class="d-flex justify-content-between flex-column mt-1">
    <a
      href="#"
      @click.prevent="active = !active"
      class="row p-2 align-items-center  text-decoration-none text-white"
    >
      <div class="col-10 text-white">{{ title }}</div>
      <div class="col-2">
        <span class="down-Arrow text-white" v-show="!active">&#9660;</span>
        <span class="up-Arrow text-white" v-show="active">&#9650;</span>
      </div>
    </a>
    <div class="tab__content p-2 clasic-enter" v-show="active"><slot /></div>
  </div>
</template>

<script>
export default {
  props: ["title"],
  data() {
    return {
      active: false,
    };
  },
};
</script>

<style scoped>
.card-text-white a{
    background: #0000003b;
    border-radius: 10px;
    font-size: 1rem;
    line-height: 1rem;
}
</style>
