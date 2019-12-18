$(function() {
    $("#credit_phone,#phone_number,#pick_phone_number").mask("+7 (999)-999-9999");
    $("#credit_iin").mask("999999999999");
    setTimeout(function(){
        $('.hot_tours_slider').slick({
            autoplay: false,
            arrows : true,
            dots : false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4
        })
    }, 500);
});