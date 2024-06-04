$(document).ready(function(){
    console.log('___ LOGIN ___')

    setRemoveImgLogIn();
    $(window).resize(function() {
        setRemoveImgLogIn();
    });

    function setRemoveImgLogIn(){
        if ($(window).width() > 768) {
            $("#img-container").append('<img src="/storage/img/GomezFarias.jpg" alt="" class="img-login-background col">');
            $("#form-login").addClass('c-white');
            $("#card-login").addClass('contiener-blur');
        }else{
            $("#img-container").empty();
            $("#form-login").removeClass('c-white');
            $("#card-login").removeClass('contiener-blur');
        }
    };
});