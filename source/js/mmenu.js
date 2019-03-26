$(document).ready(function(){
    $('.btn-menu-toggle').click(function(){
        if($(this).hasClass('active')){
            $('.slide-bar-menu').animate({'left':-270},90);
            $('.btn-menu-toggle').removeClass('active');
            $('.overlay-open-menu').hide();
        }else{
            $('.slide-bar-menu').animate({'left':0},90);
            $('.btn-menu-toggle').addClass('active');
            $('.overlay-open-menu').show();
        }
        });
        $('.overlay-open-menu').click(function(){
        $('.slide-bar-menu').animate({'left':-270},90);
        $('.btn-menu-toggle').removeClass('active');
        $('.overlay-open-menu').hide();
    });
    
    $('.menu-mobile li:has(ul)').click(function(e){
       e.preventDefault();
        
        if($(this).hasClass('m-active')){
            $(this).removeClass('m-active');
            $(this).children('ul').toggle(100);
        } else {
            $('.menu-mobile li ul').slideUp();
            $('.menu-mobile li').removeClass('m-active');
            $(this).addClass('m-active');
            $(this).children('ul').toggle(100);
        }
    });
});

