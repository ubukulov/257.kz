<template>
    <div>
        <button type="button" @click="showLeadCredit()" class="btn btn-danger">Туры в рассрочку</button>

        <!-- Modal -->
        <div class="modal fade" id="lead_ras" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #000;">Оставьте запрос на рассрочку</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" tabindex="1" id="name" class="form-control" v-model="first_name" placeholder="Ваше имя">
                                </div>

                                <div class="form-group">
                                    <input type="text" tabindex="2" id="sum" class="form-control" v-model="summ" placeholder="Сумма">
                                </div>

                                <div class="form-group">
                                    <input type="text" tabindex="3" id="credit_phone" class="form-control" placeholder="Ваш номер телефона">
                                </div>

                                <div class="form-group">
                                    <input type="text" tabindex="4" id="credit_iin" class="form-control" placeholder="Ваш ИИН">
                                </div>

                                <div class="form-group">
                                    <textarea cols="30" tabindex="5" id="com" class="form-control" rows="4" v-model="client_comments" placeholder="Комментарий *не обязательно"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button @click="sendLeadCredit()" class="btn btn-primary">Отправить запрос</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return  {
                first_name: '',
                summ: '',
                client_comments: ''
            }
        },
        props: [

        ],
        methods: {
            showLeadCredit() {
                $('#lead_ras').removeClass('fade').modal('toggle');
            },
            sendLeadCredit(){
                if ($("#credit_phone").val().length != 17) {
                    return $("#credit_phone").css({border:'1px solid red'}).focus();
                }

                if ($("#credit_iin").val().length != 12) {
                    return $("#credit_iin").css({border:'1px solid red'}).focus();
                }

                let d = {
                    leads_for_credit: {
                        name: this.first_name,
                        phone: $('#credit_phone').val(),
                        iin: $("#credit_iin").val(),
                        txt: 'Купить тур с рассрочкой',
                        sum: this.summ,
                        comment: "Горящие туры - (РАССРОЧКА): --- Комментарий: "+ this.client_comments,
                        type: 5,
                        company: 1
                    }
                };

                $.post('https://www.afinadb.kz/leads-for-credit',d,function(data) {
                    console.log(data+"| подбор тура");
                }).done(function(){
                    $('#lead_ras').addClass('fade').modal('toggle');
                });
            }
        },
        created(){

        }
    }
</script>