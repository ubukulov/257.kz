<template>
    <div>
        <button type="button" class="btn btn-success" @click="showReviewForm()">Написать отзыв</button>

        <div v-for="review in reviews" class="review">
            <div class="review_head">
                <div class="review_icon">
                    <i class="far fa-comment"></i>
                </div>
                <div class="review_user row">
                    <p><strong>{{ review.name }}, {{ review.country_title }}</strong><br><span>г. {{ review.city_title }}</span></p>
                </div>
            </div>

            <div class="review_body">
                <div class="review_rating mb-4">
                    <star-rating :round-start-rating="false" :rating="review.rating" :star-size="20" :read-only="true"></star-rating>
                </div>
                <div class="review_like mb-4">
                    <span>Понравилось:</span>
                    {{ review.positive }}
                </div>

                <div v-if="review.negative" class="review_dislike">
                    <span>Не понравилось:</span>
                    {{ review.negative }}
                </div>
            </div>

            <div class="review_footer">
                <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Период отдыха: <strong>с {{ review.s_d }} до {{ review.e_d }}</strong>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Оставить отзыв</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="iks" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" v-model="first_name" placeholder="Ваше имя">
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" v-model="email" placeholder="Ваш email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Ваш город</label>
                                        <select v-model="city_id" class="form-control">
                                            <option v-for="c in cities" :value="c.id">{{ c.title }}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Где отдыхали</label>
                                        <select v-model="country_id" class="form-control">
                                            <option v-for="k in countries" :value="k.id">{{ k.title }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Период отдыха</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <datepicker placeholder="c" v-model="start_date" :language="languages[language]"></datepicker>
                                        </div>

                                        <div class="col-sm-6">
                                            <datepicker placeholder="до" v-model="end_date" :language="languages[language]"></datepicker>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Ваше оценка</label>
                                    <star-rating @rating-selected="rating = $event" :increment="0.5" :star-size="30" :rating="rating"></star-rating>
                                </div>

                                <div class="form-group">
                                    <label>Пюлсы</label>
                                    <textarea v-model="positive" cols="30" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Минусы</label>
                                    <textarea v-model="negative" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-on:click="writeReview()" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="thank_you" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Готово</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="iks" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Отзыв был добавлен! После проверки модератором он будет виден
                    </div>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Datepicker from 'vuejs-datepicker';
    import * as lang from "vuejs-datepicker/src/locale";
    import StarRating from 'vue-star-rating';
    import axios from 'axios';
    export default {
        components: {
            Datepicker,
            StarRating
        },
        data(){
            return {
                first_name: '',
                email: '',
                city_id: 1,
                country_id: 1,
                start_date: 0,
                end_date: 0,
                rating: 0,
                positive: '',
                negative: '',
                language: "ru",
                languages: lang,
                reviews: []
            }
        },
        props: [
            'cities',
            'countries'
        ],
        methods: {
            showReviewForm(){
                $('#modal_review').removeClass('fade').modal('toggle');
            },
            writeReview(){
                let data = {
                    'first_name': this.first_name,
                    'email': this.email,
                    'city_id': this.city_id,
                    'country_id': this.country_id,
                    'start_date': this.start_date,
                    'end_date': this.end_date,
                    'rating': this.rating,
                    'positive': this.positive,
                    'negative': this.negative,
                };
                axios.post('/reviews', data)
                    .then(res => {
                        console.log(res)
                        $('#modal_review').addClass('fade').modal('toggle');
                        $('#thank_you').removeClass('fade').modal('toggle');
                    })
                    .catch(e => {
                        console.log(e)
                    })
            },
            getReviews(){
                axios.post('/reviews/list')
                    .then(res => {
                        this.reviews = res.data;
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        },
        created(){
            this.getReviews();
        }
    }
</script>
<style scoped="">
    .iks {
        font-size: 30px;
    }
    .modal-body {
        font-size: 20px;
    }
</style>