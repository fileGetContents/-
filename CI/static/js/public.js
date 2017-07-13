$(function(){
    // 回到顶部
    $(window).scroll(function(){
        if ($(window).scrollTop()>200){
            $(".return_top").fadeIn();
        }
        else
        {
            $(".return_top").fadeOut();
        }
    });
    $(".return_top").click(function(){
        $('body,html').animate({scrollTop:0},120);
        return false;
    });
    if($(window).width()<993){
        $("#return_top").removeClass('return_top');
    }

    var $url_this= window.location.href;
    var $li = $('.capsule li').children();
    for (var i = 0; i < $li.length; i++) {
        var $href = $li[i].href;
        if($url_this == $href){
            $($li[i]).parent().addClass('active').siblings('.active').removeClass('active');
        }
        if($url_this != $href) {
            $($li[i]).parent().removeClass('active');
        }
    };

    var $div = $('.nav_product').children();
    var acd = $url_this.split('/');
    var adc = acd[0] +'//' + acd[2] +'/'+acd[3]+'/'+acd[4];
    for (var i = 0; i < $div.length; i++) {
        var $hrefs = $div[i].href;
        if($hrefs == adc){
            $('.capsule li:nth-child(2)').addClass('active');
        }
    };
})