<template>
    <div class=" buttonsSelection">
        <template v-for="(l, index) in levels">
            <div @click="membersSelection(parseInt(index))" :class="(level === parseInt(index)) ? 'active ' : ''">{{ l }}</div>
        </template>
<!--        <div @click="membersSelection(1)" :class="(level === 1) ? 'active ' : ''">Binance</div>-->
<!--        <div @click="membersSelection(2)" :class="(level === 2) ? 'active ' : ''">Kraken</div>-->
<!--        <div @click="membersSelection(3)" :class="(level === 3) ? 'active ' : ''">Gemini</div>-->
<!--        <div @click="membersSelection(4)" :class="(level === 4) ? 'active ' : ''">Bithumb</div>-->
    </div>
    <div v-if="cryptoLoading" class="card-background mt-2 p-2">
        <div class="crypto-loader">
            <img src="/images/crypto-loader.gif" alt="Loading">
        </div>
    </div>
    <div v-else class="card-background mt-2 p-2" :key="index" >
<!--        <div class="d-flex justify-content-between align-content-center align-items-center border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div><p class="coin-logo">{{crypto.name.charAt(0)}}</p></div>
                <div class="text-white">{{ crypto.name }}</div>
            </div>
            <div class="text-white">
                {{ crypto.name }} - USDT
            </div>
            <div class="prices text-info" v-for="item in crypto.quote">
                {{ item.price.toFixed(2) }}
            </div>
        </div>-->
        <div class="text-white d-flex justify-content-between align-content-center align-items-center border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div><img style="width:30px;" src="/images/bitcoin.png" alt="btc" class="coin-logo"></div>
                <div>BTC</div>
            </div>
            <div>
                BTC - USDT
            </div>
            <div class="prices">
                {{ coins.btc }}
            </div>
        </div>
        <div class="text-white d-flex justify-content-between align-content-start align-items-end border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div>
                    <img style="width:30px;" src="/images/eth.jpeg" alt="btc" class="coin-logo"></div>
                <div>ETH</div>
            </div>
            <div>
                ETH - USDT
            </div>
            <div class="prices">
                {{ coins.eth }}
            </div>
        </div>
        <div class="text-white d-flex justify-content-between align-content-center align-items-end border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div><img style="width:30px;" src="/images/xrp.png" alt="btc" class="coin-logo"></div>
                <div>XRP</div>
            </div>
            <div>
                XRP - USDT
            </div>
            <div class="prices">
                {{ coins.xrp }}
            </div>
        </div>
        <div class="text-white d-flex justify-content-between align-content-center align-items-end border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div><img style="width:30px;" src="/images/ada.png" alt="btc" class="coin-logo"></div>
                <div>ADA</div>
            </div>
            <div>
                ADA - USDT
            </div>
            <div class="prices">
                {{ coins.ada }}
            </div>
        </div>
        <div class="text-white d-flex justify-content-between align-content-center align-items-end border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div><img style="width:30px;" src="/images/sol.png" alt="btc" class="coin-logo"></div>
                <div>SOL</div>
            </div>
            <div>
                SOL - USDT
            </div>
            <div class="prices">
                {{ coins.sol }}
            </div>
        </div>
        <div class="text-white d-flex justify-content-between align-content-center align-items-end border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div><img style="width:30px;" src="/images/etc.png" alt="btc" class="coin-logo"></div>
                <div>ETC</div>
            </div>
            <div>
                ETC - USDT
            </div>
            <div class="prices">
                {{ coins.etc }}
            </div>
        </div>
        <div class="text-white d-flex justify-content-between align-content-center align-items-end border-bottom-row p-2">
            <div class="d-flex justify-content-between gap-2 align-items-center align-content-center ">
                <div><img style="width:30px;" src="/images/link.png" alt="btc" class="coin-logo"></div>
                <div>LINK</div>
            </div>
            <div>
                LINK - USDT
            </div>
            <div class="prices">
                {{ coins.link }}
            </div>
        </div>

    </div>
</template>

<script>


export default {
    name: "Exchange",
    props: ['levels'],
    data() {
        return {
            coins: {
                btc: 0,
                eth: 0,
                dot: 0,
                xrp: 0,
                ada: 0,
                sol: 0,
                avax: 0,
                etc: 0,
                link: 0,

            },
            cryptoList: [],
            cryptos: null,
            cryptoLoading: false,
            level: 1,
        };
    },
    methods: {
        fetchCryptoList(market) {
            this.cryptoLoading = true;
            this.coins = {
                btc: 0,
                eth: 0,
                dot: 0,
                xrp: 0,
                ada: 0,
                sol: 0,
                avax: 0,
                etc: 0,
                link: 0,

            };
            // Make an AJAX request to your Laravel controller route
            axios.post('/crypto-list', {market: market})
                .then(response => {
                    let rates = response.data;
                    // this.cryptoList = response.data; // Assuming response structure matches CoinMarketCap API response
                    // console.log('this.cryptoList', this.cryptoList)
                    this.coins.btc = this.fixed(rates.BTC)
                    this.coins.eth = this.fixed(rates.ETH)
                    this.coins.dot = this.fixed(rates.DOT)
                    this.coins.xrp = this.fixed(rates.XRP)
                    this.coins.ada = this.fixed(rates.ADA)
                    this.coins.sol = this.fixed(rates.SOL)
                    this.coins.avax = this.fixed(rates.AVAX)
                    this.coins.etc = this.fixed(rates.ETC)
                    this.coins.link = this.fixed(rates.LINK)
                })
                .catch(error => {
                    console.error('Error fetching cryptocurrency list:', error);
                }).finally(() => {
                //Perform action in always
                this.cryptoLoading = false;
            });
        },
        fixed(num){
         return (Math.round(num * 100) / 100).toFixed(2);
        },

        membersSelection(value) {
            this.cryptoList = [];
            this.level = value;
            if (this.levels[value] === '' || this.levels[value] === false || this.levels[value] === undefined) {
                this.cryptos = null;
                return;
            }
            this.fetchCryptoList(value);
            this.cryptos = this.levels[value];
        }

    },
    mounted() {
        this.membersSelection(1)
    }

}
</script>

<style scoped>
.border-bottom-row{
    border-bottom: 1px solid #706d6d33;
}
.coin-logo{
    margin: 0;
    color: #fff;
    background: orange;
    border-radius: 50%;
    width: 30px;
    font-weight: 600;
    height: 30px;
    line-height: 30px;
    text-align: center;
}
.prices{
    color: #ffffff;
    min-width: 80px;
    font-weight: bold;
}
.crypto-loader{
    height: 550px;
    position: relative;
}
.crypto-loader img{
    width: 300px;
    height: auto;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}
.card-background{
    background: #0000003b;
    border-radius: 10px
}
.buttonsSelection{
    margin: auto;
    border-radius: 0;
    font-size: 1rem;
    box-shadow: none;
    background: #0000003b;
}
.buttonsSelection .active{
    background: none;
    border-bottom: 2px solid #43ffff;
    border-radius: 0;
}
</style>
