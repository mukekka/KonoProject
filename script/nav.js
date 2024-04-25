$(function () {
    $(window).scroll(function () {
        var scrollY = $(document).scrollTop();
        if(scrollY > 20){
            $(".header").addClass('hiddened');
        }else{
            $(".header").removeClass('hiddened');
        }
    })
})