$(function(){

    $('.login, .login input').click(function(e){

        var that = $('.login').css({
            background:'hsla(48, 100%, 44%, 1)'
        });

        if(!$('.login-form').hasClass('loginopen')){
            $('.login-form').addClass('loginopen')
            keepOpen();
        }

        $('.login-form').css({ opacity:1 });

        if($(e.target).get(0) == $('.login').get(0)){
            $('.login .username').focus();
        }

        function keepOpen(){

            $(window).one('click',function(e){
                if($(e.target).parents().has(that).length){
                    keepOpen();
                }else{

                    $('.login-form').css({ opacity:'' }).removeClass('loginopen');
                    $('.login').css({
                        background:''
                    });
                }

            });

        }

    });

});
