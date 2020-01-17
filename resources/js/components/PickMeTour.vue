<template>
    <div>
        <button class="btn btn-primary pick_me_tour" @click="showPickMeTourForm()" type="button">Подберите мне тур</button>

        <!-- Modal -->
        <div class="modal fade" id="modal_lead" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle" style="color: #000;">Оставьте заявку на подбор тура</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="first_name" placeholder="Введите имя">
                                </div>

                                <div class="form-group">
                                    <input id="pick_phone_number" type="text" class="form-control" v-model="phone" placeholder="Введите номер телефона">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="sendLead()" class="btn btn-primary">Отправить заявку!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        data(){
            return {
                first_name: "",
                phone: ""
            }
        },
        props: [

        ],
        methods: {
            showPickMeTourForm(){
                $('#modal_lead').removeClass('fade').modal('toggle');
            },
            sendLead(){
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
                            comment: 'Заявка на подбор тура с сайта 257.kz',
                            type: '5'
                        }
                    };

                    $.post('https://www.afinadb.kz/ajax',d,function(data) {
                        console.log(data+"| подбор тура");
                    }).done(function(){
                        $('#modal_lead').addClass('fade').modal('toggle');
                    });
                }
            }
        },
        created(){

        }
    }
</script>