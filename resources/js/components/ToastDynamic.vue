<template>

</template>
<script>

export default {
    name: "toast",
    props: ['message', 'error'],
    data() {
        return {
        };
    },
    created() {
        if (this.message){
            this.$toast.success(this.message);
        }
        if (this.error){
            this.$toast.error(this.error);
        }
    }


}
</script>

<style scoped>

</style>
