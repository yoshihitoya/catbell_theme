$(function(){
    var imgHeight = $('.js-header').outerHeight(); //画像の高さを取得。これがイベント発火位置になる。
    var header = $('.js-header'); //ヘッダーコンテンツ
    $(window).on('load scroll', function(){
        if ($(window).scrollTop() < imgHeight) {
         //メインビジュアル内にいるので、クラスを外す。
        header.removeClass('header--default');
        }else {
         //メインビジュアルより下までスクロールしたので、クラスを付けて色を変える
        header.addClass('header--default');
        }
    });
    
    $(document).ready(function() {
        $('.drawer').drawer();
    });
});