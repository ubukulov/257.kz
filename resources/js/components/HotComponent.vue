<template>
    <div class="hot-tours">
        <div class="hot-title">
            <h3>Горящие туры из
                    <select v-model="selectedCity" v-on:change="changeCityHot(selectedCity)">
                <option v-for="city in tourCities" :value="city">{{ city }}</option>
            </select>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="hot_tours_slider">
                    <div class="card" v-for="hot in hot_tours">
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
                                    <a href="#" class="btn btn-primary">Купить</a>
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
    import axios from 'axios'
    export default {
        data() {
            return {
                selectedCity: 'Алматы',
                tours: [],
                hot_tours: []
            }
        },
        props: [
            'selectedCurrency',
            'currency',
            'tourCities',
            'currencies'
        ],
        methods: {
            convertCurrency(sum) {
                var price = sum.replace(/[^\d;]/g, '');
                var vl = this.currencies[this.selectedCurrency];

                if (vl === 'usd'){
                    price = Math.round(price / this.currency.KZT);
                    return "от "+price+" USD";
                } else if (vl === 'eur'){
                    price = Math.round((price / this.currency.KZT) * this.currency.EUR);
                    return "от "+price+" EUR";
                } else {
                    return "от "+price+" KZT";
                }
            },
            changeCityHot(city) {
                this.selectedCity = city;
                this.hot_tours = this.tours;
                this.hot_tours = this.hot_tours.filter(x => x.city === city);
            },
            getHotTours(){
                axios.get('/get/hot-tours')
                    .then(res => {
                        this.tours = res.data;
                        this.hot_tours = res.data.filter(x => x.city === this.selectedCity);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        },
        created(){
            this.getHotTours();
        }
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
