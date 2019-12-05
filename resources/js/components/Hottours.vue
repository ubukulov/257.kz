<template>
    <div>
        <div v-for="hot in hottours" class="hot-tours-preview horizontal">
            <div class="preview-image">
                <a href="//ht.kz/blog/bez-rubriki/super-predlogeniya-na-prazdniki-v-dominikanu-vilet-iz-moskvi">
                    <img :src="hot.url" class="preview-img">
                </a>
                <div class="bottom-line active">
                    <span class="pull-left discount-value">Скидка {{ hot.sale }}%</span>
                    <span class="pull-right duration-value">
                        <img src="/img/clock_white.svg" width="19" class="icon">
                        Осталось {{ hot.date_from }} дня                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="preview-content">
                <div class="preview-header">
                    <div class="preview-title fw-b">
                        {{ hot.title }}
                    </div>
                    <div class="preview-description">
                        {{ hot.text }}
                    </div>
                </div>
                <div class="preview-city fw-m">

                </div>
                <div class="clearfix"></div>

                <div class="preview-price">
                    <div class="price-value">{{ hot.price }}</div>
                </div>

                <div class="preview-action">
                    <button class="btn btn-primary" type="button">Оставить заявку</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {

            }
        },
        props: {
            hottours: Array
        },
        methods: {

        }
    }
</script>
<style scoped>
    .hot-tours-preview {
        margin-top: 20px;
        display: flex;
        align-items: stretch;
    }
    .hot-tours-preview .preview-image {
        width: 30%;
        overflow: hidden;
        position: relative;
        background: #f1f1f1;
        text-align: center;
    }
    .hot-tours-preview .preview-image .bottom-line.active {
        background: rgba(255,191,0,0.9);
        color: #fff;
    }
    .hot-tours-preview .preview-image .bottom-line {
        padding: 13px 10px;
        position: absolute;
        bottom: 0;
        width: 100%;
        font-size: 16px;
    }
    .hot-tours-preview .preview-content {
        width: 70%;
        padding: 20px 10px 10px 15px;
        border: 1px solid #e1e1e1;
        border-left: 0;
        line-height: 1.1;
    }
    .hot-tours-preview .preview-content .preview-header {
        margin-bottom: 10px;
        min-height: 125px;
    }

    .hot-tours-preview .preview-header, .hot-tours-preview .preview-price {
        width: 70%;
        float: left;
    }
    .hot-tours-preview .preview-city {
        position: relative;
        padding-left: 40px;
    }

    .hot-tours-preview .preview-city, .hot-tours-preview .preview-action {
        max-width: 30%;
        float: right;
        font-size: 17px;
    }
    .fw-m {
        font-weight: 500;
    }
    .hot-tours-preview .preview-header, .hot-tours-preview .preview-price {
        width: 70%;
        float: left;
    }
    .hot-tours-preview .preview-city, .hot-tours-preview .preview-action {
        max-width: 30%;
        float: right;
        font-size: 17px;
    }
    .hot-tours-preview .preview-content .preview-title {
        font-size: 20px;
        margin-bottom: 10px;
    }
    .fw-b {
        font-weight: 700;
    }
    .hot-tours-preview .preview-price .price-value {
        line-height: 1;
        font-size: 27px;
        font-weight: 500;
    }
</style>