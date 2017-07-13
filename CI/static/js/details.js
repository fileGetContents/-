// 轮播图
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    paginationClickable: true,
    centeredSlides: true,
    autoplay: 3000,
    autoplayDisableOnInteraction: false,
    loop: true
});

// 二级菜单
$(".subnav a").click(function(){
    $(this).addClass('active').siblings('.active').removeClass('active');
    var index = $(".subnav a").index(this);
    $('.subnav_list > div').eq(index).show().siblings().hide();
    return false;
})