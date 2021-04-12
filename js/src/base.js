/*======================================================
    トップページ戻るボタンの表示・非表示
======================================================*/
$(window).on('load scroll', function(){
    //目的のスクロール量を設定(px)
    var targetPost = 300;
    //スクロールした距離
    var scrollPost = $(window).scrollTop();
    //footerの高さ
    var footerHeight = $('#js-footer').innerHeight();
    //documentの高さ
    var documentHeight = $(document).height();
    //現在地の取得
    var currentPos = $(window).height()+scrollPost;

    // 現在位置が目的のスクロール量に達しているかどうかを判断
        if(scrollPost >= targetPost) {
            //表示
            $('#js-scrollBtn').fadeIn();
        } else {
            //非表示
            $('#js-scrollBtn').fadeOut();
        }
    //ドキュメントの高さ+現在地が、footerの高さ以下になったら
    if(documentHeight-currentPos <= footerHeight) {
        $('#js-scrollBtn').css({
            'position':'fixed',
            'bottom':footerHeight+20,
        });
    } else {
        $('#js-scrollBtn').css({
            'position':'fixed',
            'bottom':20,
        }); 
    }
});

/*======================================================
    トップページ戻るアニメーション
======================================================*/
$('#js-scrollBtn').on('click', function() {
    $('html,body').animate(
        {scrollTop:0},1000
    )
});

/*======================================================
    ハンバーガーメニューのクリックイベント　✕⇔三
======================================================*/
$('.js-toggle-sp-menu').on('click', function() {
    $('.js-trigger').toggleClass('is-active');
});

/*======================================================
    SP用ドロワーメニューのクリックイベント
======================================================*/
$('.js-toggle-sp-menu').on('click', function() {
    $('.js-sp-drawer').slideToggle('slow');
});

//ドロワーメニューがクリックされた時も上記のクリックイベント発火させる
$('.js-drawer-list').on('click', function() {
    if (window.innerWidth <= 768) {
        $('.js-toggle-sp-menu').click();
    }
});
  
/*=====================================================
 コンテンツ効果
=======================================================*/
// 読み込んだ時とスクロールした時
$(window).on('load scroll', function(){

    scroll_effect();
    
    function scroll_effect(){
      $('.js-effect-fade').each(function(){
        //要素からTopまでの距離
        var elemPos = $(this).offset().top;
        //スクロールした量
        var scroll = $(window).scrollTop();
        //windowの高さ（画面）
        var windowHeight = $(window).height();
        if (scroll > elemPos - windowHeight + 50){
          $(this).addClass('is-effect-scroll');
        }
      });
    }
  });

