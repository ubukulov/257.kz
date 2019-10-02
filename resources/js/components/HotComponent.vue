<template>
    <div class="hot-tours">
        <div class="container">
            <div class="hot-title">
                <h3>Горящие туры из
                    <select v-model="selectedCity" v-on:change="changeCityHot(selectedCity)">
                        <option v-for="city in tourCities" :value="city">{{ city }}</option>
                    </select>
                </h3>
            </div>
            <div class="row justify-content-center hot_tours_slider">
                <div class="col-md-3" v-for="hot in tours">
                    <div class="card">
                        <div class="card-img">
                            <img :src="hot.url" :alt="hot.title">
                            <div class="discount-val">
                                - {{hot.sale}}%
                            </div>
                            <div class="hot-country">
                                {{ hot.country }}
                            </div>
                        </div>

                        <div class="card-timer"></div>

                        <div class="card-body">
                            <div class="card-title">
                                {{ hot.title }}
                            </div>

                            <div class="card-desc">
                                {{ hot.text }}
                            </div>

                            <div class="card-price">
                                <div class="card-cost">
                                    <div class="cost-for-person">Цена на 1 человека:</div>
                                    <div class="hot-price">
                                        {{ convertCurrency(hot.price) }}
                                    </div>
                                </div>
                                <div class="card-button">
                                    <a href="#" class="btn btn-primary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                selectedCity: 'Алматы'
            }
        },
        props: [
            'tours',
            'selectedCurrency',
            'currency',
            'tourCities'
        ],
        methods: {
            convertCurrency(sum) {
                var price = sum.replace(/[^\d;]/g, '');

                if (this.selectedCurrency == 'usd'){
                    price = Math.round(price / this.currency.KZT);
                    return "от "+price+" USD";
                } else if (this.selectedCurrency == 'eur'){
                    price = Math.round((price / this.currency.KZT) * this.currency.EUR);
                    return "от "+price+" EUR";
                } else {
                    return "от "+price+" KZT";
                }
            },
            changeCityHot(city) {
                this.selectedCity = city;
            }
        }/*,
        computed: {
            activeTours: function () {
                return this.tours.filter((tour) => {
                    return tour.city == this.selectedCity;
                })
            }
        }*/
    }
</script>

<style>
    .slick-prev:before {
        font-size: 70px !important;
        color: #7059A3;
        left: -50px;
        top: -13px;
        background: white;
        position: absolute;
    }
    .slick-next:before {
        font-size: 70px !important;
        color: #7059A3;
        left: 0px;
        top: 0px;
        background: white;
        position: absolute;
    }
</style>
