jQuery(document).ready(function() {

    // wowjs
    new WOW().init();

    //ローディング画面の表示
    jQuery(window).on('load',function(){
        jQuery("#loading").delay(1500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
        jQuery("#loading_box").delay(1200).fadeOut('slow');//ローディングテキストを1.2秒（1200ms）待機してからフェードアウト
    });

    // ハンバーガーメーニュー
    jQuery("#js-header-btn").click(function() {
        jQuery(this).toggleClass("active");
        jQuery("#js-header-nav").toggleClass("active");
        jQuery("#js-burger-musk").toggleClass("is-open");
    });

    jQuery("#js-burger-musk").click(function() {
        jQuery(this).removeClass("is-open");
        jQuery("#js-header-btn").removeClass("active");
        jQuery("#js-header-nav").removeClass("active");
    });

    // スライダー
    jQuery('.slider').slick({
        centerMode: true,
        centerPadding: '0%',
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,

        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                centerPadding: '20%',
              },
            },

            {
            breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                  centerPadding: '0%',
                },
            },
        ]
    });
 
    // スムーススクロール
    jQuery('a[href^="#"]').click(function() {

      // スクロールスピード
      let speed = 300;
      // hrefで指定されたidを取得
      let id = jQuery(this).attr("href");
      // 移動先の調整
      let adjust = 30;
      // idのの値が#だけだったらターゲットをhtmlタグにしてtopに戻るようにする
      let target = jQuery("#" == id ? "html" : id);
      // ターゲットの位置を取得し、調整がある場合は位置の調整を行う
      let position = jQuery(target).offset().top + adjust;
      // スクロール実行
      jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
  });

  //スクロールしたらボタン表示
  let topBtn = jQuery('#scroll-top');    
  topBtn.hide();
  jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 300) {
          topBtn.fadeIn();
      } else {
          topBtn.fadeOut();
      }
  });
        
});