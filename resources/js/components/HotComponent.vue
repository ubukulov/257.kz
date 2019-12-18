<template>
    <div>
        <div class="hot-title">
            <h3>Горящие туры из
                <select v-model="selectedCity" v-on:change="changeCityHot(selectedCity)">
                    <option v-for="city in tourCities" :value="city">{{ city }}</option>
                </select>
            </h3>
        </div>
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
                            <a href="#" :id="hot.id" @click="buyForm(hot.id)" :data-tour="hot.title" :data-info="hot.text" :data-percent="hot.sale" class="btn btn-primary">Купить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="hot_lead" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #000;">Оставьте заявку</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="first_name" type="text" class="form-control" v-model="first_name" placeholder="Введите имя">
                                </div>

                                <div class="form-group">
                                    <input id="phone_number" type="text" class="form-control" v-model="phone" placeholder="Введите номер телефона">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="buyLead()" class="btn btn-primary">Отправить заявку!</button>
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
                hot_tours: [],
                one_hot: {},
                first_name: '',
                phone: ''
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
            },
            buyForm(btn_id){
                $('#hot_lead').removeClass('fade').modal('toggle');
                var btn = $("#"+btn_id);
                let ht = {
                    title: btn.data('tour'),
                    info: btn.data('info'),
                    percent: btn.data('percent')
                };
                this.one_hot = ht;
            },
            buyLead(){
                if(this.first_name.length == '') {
                    return $("#first_name").css({border:'1px solid red'}).focus();
                }

                if(this.phone.length == '') {
                    return $("#phone_number").css({border:'1px solid red'}).focus();
                }

                if (this.first_name.length != '' && this.phone.length != '') {
                    let d = {
                         leads: {
                             name: this.first_name,
                             phone: this.phone,
                             comment: 'Комментарии: '+this.one_hot.title+', '+this.one_hot.info + ', Скидка: '+this.one_hot.percent+'%',
                             type: '5'
                         }
                    };

                     $.post('https://www.afinadb.kz/ajax',d,function(data) {
                        console.log(data+"| подбор тура");
                     }).done(function(){
                        $('#hot_lead').addClass('fade').modal('toggle');
                     });
                }
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
