<template>
    <div class="container ">
        <div class="card-background w-100 mt-4 py-2 bg-fade-dark">
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 bottom-line text-white border-bottom-1">
                <div>
                    Order No:
                </div>
                <div>
                    {{ strategy.order_id }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 bottom-line text-white border-bottom-1">
                <div>
                    SpiderWeb:
                </div>
                <div>
                    {{ strategy.name }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 bottom-line text-white border-bottom-1">
                <div>
                    Order Time:
                </div>
                <div>

                    {{ getDate(created) }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 bottom-line text-white border-bottom-1">
                <div>
                    End Time:
                </div>
                <div>
                    {{ strategy.active_until }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 bottom-line text-white border-bottom-1">
                <div>
                    Investment Amount:
                </div>
                <div>
                    {{ strategy.amount }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center align-content-center p-2 text-white">
                <div>
                    Order Status:
                </div>
                <div class="px-2 btn-polygon-2 bg-gradient-2 text-white" style="">
                    Finished
                </div>
            </div>
        </div>
        <div class="card-background mt-4 py-2">

            <div class="wrapper">
                <div class="pie-chart bg-fade-dark px-3">
                    <canvas ref="chart" style="width: 100% !important;"></canvas>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import Chart from 'chart.js/auto';

export default {
    name: "Finished",
    props: ['strategy', 'created', 'data'],
    mounted() {
        this.renderChart();
    },
    methods: {
        getDate(date){
            let toDt = moment.utc(date).toDate();

            return moment(toDt).format('YYYY-MM-DD hh:mm:ss A')
        },
        renderChart() {
            const ctx = this.$refs.chart.getContext('2d');
            new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: ['BTC', 'SOL', 'ETC', 'Link', 'ETH', 'ADA'],
                    datasets: [
                        {
                            data: this.data,
                            backgroundColor: ['#ed6666', 'lightskyblue', '#fc8452', '#5470c6', '#90cc74', '#fac758'],
                            hoverBackgroundColor: ['#ed6666', 'lightskyblue', '#fc8452', '#5470c6', '#90cc74', '#fac758'],
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'left',
                            // maxHeight: '10',
                            // maxWidth: '10',
                            labels: {
                                color: '#FFFFFF',
                                useBorderRadius: true,
                                border: false,
                                usePointStyle: true,
                                borderRadius: 30,
                                aligh: 'start',
                                boxWidth: 10,
                                boxHeight: 10,
                                lineWidth: 1
                            }
                        },
                        title: {
                            display: false,
                            color: '#FFFFFF',
                            text: 'You Have Earned By',
                            font: {
                                size: 20
                            }
                        }
                    },
                    scales: {
                        r: {
                            pointLabels: {
                                display: true,
                                color: '#FFFFFF',
                                centerPointLabels: true,
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                },
            });
        },
    },
}
</script>
