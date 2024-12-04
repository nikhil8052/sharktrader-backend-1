<template>
    <div class=" buttonsSelection">
        <div @click="membersSelection(1)" :class="(level === 1) ? 'active ' : ''">Level 1</div>
        <div @click="membersSelection(2)" :class="(level === 2) ? 'active ' : ''">Level 2</div>
        <div @click="membersSelection(3)" :class="(level === 3) ? 'active ' : ''">Level 3</div>
        <div @click="membersSelection(4)" :class="(level === 4) ? 'active ' : ''">Level 4</div>
        <div @click="membersSelection(5)" :class="(level === 5) ? 'active ' : ''">Level 5</div>
    </div>

    <section class="card-background mt-4 ">
        <div class=" row justify-content-center align-items-center">
            <div class="col-md-12">
                <section class="p-3 d-flex justify-content-between flex-column">
                    <h4 class="text-white text-center">Team Members</h4>
                    <h6 class="text-white text-center">Level : {{ level }}</h6>

                    <div v-if="members" v-for="member in members" :key="member.id"
                        style="border-bottom: 1px solid #706d6d33;"
                        class="row p-2 align-items-center  text-decoration-none">
                        <div class="col-7 text-white" style="
                                text-overflow: ellipsis;
                                overflow: hidden;
                                padding: 0;
                            ">
                            <div class="username-container">
                                <div class="profile-container">
                                    <div class="profile-img">
                                        <div class="user-letters text-center" style="width: 35px;height: 35px; font-s">
                                            {{ member.user.name.toUpperCase().charAt(0) }}
                                        </div>
                                    </div>
                                    <div class="profile-description">
                                        <span class="user-title" style="font-size: 0.85rem">{{ member.owner_email.toLowerCase() }}</span>
                                        <span class="username" style="font-size: 0.85rem">{{ member.user.created_date }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 fw-bold text-warning">
                            <b>{{ parseFloat(member.balance).toFixed(2) }} </b> USDT
                        </div>
                        <div class="col-1">
                            <img v-if="member.strategy" class="working" style="width: 20px;" src="/images/coin-spin.svg" alt="working">
                        </div>
                        <div class="col-2 fw-bold text-warning info">
                            {{ member.user.user_id }}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "TeamMember",
    props: ['levels'],
    data() {
        return {
            members: null,
            level: 1,
        }
    },
    methods: {
        membersSelection(value) {
            this.level = value
            if (!this.levels[value]) {
                this.members = null;
                return;
            }
            this.members = this.levels[value];
        }
    },
    mounted() {
        this.membersSelection(1)
    }
}
</script>

<style scoped>
.username-container{
    padding: 0 !important;
}
.username-container .profile-container .user-letters{
    font-size: 35px;
    line-height: 35px;
    width: 35px;
    height: 35px;
}
.username-container .profile-description{
    margin-left: 0px;
}
.buttonsSelection>div{
    width: 20% !important;
}
</style>
