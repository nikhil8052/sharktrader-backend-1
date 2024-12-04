<template>
    <div class="">
        <div class="row">
            <img style="width: 500px; margin: 20px auto; transform: scaleX(-1); opacity: .8;" src="/images/spider-black.png" alt="shark">
            <div v-if="present" @click="claimShark" class="position-relative text-decoration-none">
                <img class="ball" style="position:absolute; bottom:20px; right: 0; width: 70px; margin: 20px auto;"
                     src="/images/present.png" alt="present">
            </div>
        </div>

        <form @submit.prevent="onSubmit">
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap">
                    <a v-for="shark in JSON.parse(sharks)" :class="[isActive === shark.id ? 'activeClass' : '' ]"
                       :key="shark.id" @click="saveShark(shark)"
                       class="small_button gradient text-decoration-none d-flex justify-content-between align-items-center px-1 menu-button mb-2">
                        <div
                             class="d-flex gap-1 justify-content-between align-items-center align-content-center px-1">
                            <div>{{ shark.cost }}</div>
                            <div>
                                <img style="width: 15px;" src="/images/Tether-USDT-icon.webp" alt="logo">
                            </div>
                        </div>
                        <div
                            class="flex-row-mobile d-flex justify-content-between align-items-center align-content-center flex-column px-1"
                            style="">
                            <div class="">{{ shark.duration }} <span v-if="shark.duration === 1">Day Available</span>
                                <span v-if="shark.duration > 1">Days Available</span></div>
<!--                            <div class="border-left-mobile">Earning Margin {{ shark.percentage }} %</div>-->
                        </div>

                    </a>
                </div>
                <div class="card-background row mt-4 p-2 align-items-center  text-decoration-none bg-fade-dark">
                    <div class="col-12 d-flex gap-2">
                        <svg style="width:25px;" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                        <h5 class="mb-0 heading-label">Product Description</h5>
                    </div>
                    <div class="info mt-1 text-white">
                        Unlock the true potential of the digital currency market with SpiderWeb - the revolutionary
                        product from our company. Our cutting-edge technology mines the depths of historical data from
                        the world's top trading platforms, giving you an edge over the competition. With fully automated
                        trading capabilities and built-in core algorithms, SpiderWeb makes it easy to turn your
                        financial dreams into reality.
                    </div>
                </div>
                <div class="card-background row mt-4 p-2 align-items-center text-decoration-none bg-fade-dark mb-2">
                    <div class="col-12 d-flex gap-2" >
                        <svg style="width:25px;" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                        </svg>
                        <h5 class="mb-0 heading-label">
                            User Notice
                        </h5>
                    </div>
                    <div class="info mt-1 text-white">
                        <p class="mb-1"> 1. Quantitative trading SpiderWeb, limited to SpiderWeb members for use,
                            non-refundable
                            after
                            successful purchase!</p>
                        <p class="mb-1"> 2. SpiderWeb can not be given away after use!
                        </p>
                        <p class="mb-1"> 3. The price of the SpiderWeb is subject to the official label!
                        </p>
                        <p class="mb-1"> 4. The purchase of SpiderWeb does not directly generate income. SpiderWeb
                            is a high-
                            frequency quantitative trader. Only SpiderWeb trading can generate income!</p>
                    </div>
                </div>

                <div class="container mb-2 ">
                    <label for="one_time_password" class="col-12 col-form-label text-white">
                        <span>OTP Code</span>
                        <div v-if="user.google2fa_secret === ''" class="d-flex gap-2" style="font-size: 0.75rem">You have not configured 2FA
                            <a href="/setup-2fa" class="btn btn-danger">
                                Configure 2FA Now
                            </a>
                        </div>
                    </label>
                    <div class="col-12">
                        <div class="align-items-center">
                            <div class="webflow-style-input">
                                <input type="text" v-model="form.one_time_password" class="" id="one_time_password" name="one_time_password">
                            </div>
                            <p class="text-white pt-2 text-description" style="padding-left: 0;">Please enter the  <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
                        </div>
                    </div>
                </div>

                <div class="container">
                  <div class="row">
                      <button class="button-14" type="submit" role="button">
                          <span class="text">Buy</span>
                          <span class="button-14-background blue"></span>
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
                      </button>
                  </div>
                </div>
            </div>
        </form>
    </div>

</template>

<script>
import axios from "axios";

export default {
    name: "Shark",
    props: ['sharks', 'present', 'user'],
    data() {
        return {
            isActive: "",
            form: {
                shark_id: '',
                user_id: '',
                cost: '',
                duration: '',
                one_time_password: '',

            },
            claim: null,
        };
    },
    methods: {
        onSubmit() {
            axios.post('/buy-spider-web', this.form)
                .then((res) => {
                    this.$toast.success(res.data.shark.name + "was purchased successfuly !");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .catch((error) => {
                    if(error.response.data.errors.failed){
                        this.$toast.error(error.response.data.errors.failed);
                    }else if(error.response.data.errors.shark_id){
                        this.$toast.error("Please select one product.");
                    }else if(error.response.data.errors.one_time_password){
                        this.$toast.error(error.response.data.errors.one_time_password);
                    } else {
                        this.$toast.error("Please select one product.");
                    }
                }).finally(() => {
                    //this.$toast.error('Something Went Wrong!');
            });
        },
        claimShark() {
            axios.post('/claim-shark', this.claim)
                .then((res) => {
                    this.$toast.success("We have sent you a new SpiderWeb as a present !");
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                })
                .catch((error) => {
                    this.$toast.error("Couldn't get the present at the moment");
                }).finally(() => {
                //Perform action in always
            });
        },
        saveShark(shark) {
            this.form.shark_id = shark.id;
            this.form.cost = shark.cost;
            this.form.duration = shark.duration;
            this.isActive = shark.id;
        }
    },
    created() {
        if (this.present) {
            this.claim = {
                user_id: JSON.parse(this.present).pivot.user_id,
                shark_id: JSON.parse(this.present).pivot.shark_id
            }
        }
    }

}
</script>

<style scoped>
.activeClass {
    border-color: rgba(44, 187, 99, .2);
    color: black;
    background: white;
}

.c-toast-container {
    top: 0 !important;
    background: #0c4128;
}

.ball {
    animation: bounce 0.5s;
    animation-direction: alternate;
    animation-timing-function: cubic-bezier(.5, 0.05, 1, .5);
    animation-iteration-count: infinite;
}

@keyframes bounce {
    from {
        transform: translate3d(0, 0, 0);
    }
    to {
        transform: translate3d(0, 50px, 0);
    }
}

/* Prefix Support */
.ball {
    -webkit-animation-name: bounce;
    -webkit-animation-duration: 0.9s;
    -webkit-animation-direction: alternate;
    -webkit-animation-timing-function: cubic-bezier(
        .8, 0.05, 1, .8);
    -webkit-animation-iteration-count: infinite;
}
.menu-button{
    width: 49%;
    gap: 0;
}

@-webkit-keyframes bounce {
    from {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    to {
        -webkit-transform: translate3d(0, 50px, 0);
        transform: translate3d(0, 50px, 0);

    }
}

@media only screen and (max-width: 380px) {
    .small_button {
        width: 45%;
    }

    .flex-row-mobile {
        flex-direction: row !important;
        font-size: 12px;
    }

    .border-right-mobile {
        border-right: 1px solid green;
        padding-right: 5px;
    }

    .border-left-mobile {
        padding-left: 5px;
    }
}
</style>
