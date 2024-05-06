// pulldownをクリックしたら
$(function(){
$('.pulldown').on('click', function() {
// this=.pulldown、クリック後に起こるエリアを指定
    let pullBtn = $(this).next(".pulldown-box");
    // .slideToggle()は、要素をスライドで表示または非表示に切り替えるjQueryのメソッド
    $(pullBtn).slideToggle();

    if($(this).hasClass('open')){
        $(this).removeClass('open');
    }else{
        $(this).addClass('open');
    }
});

});

$(window).on('load', function(){
    $('.pulldown-box').addClass("open"); //accordion-areaのはじめのliにあるsectionにopenクラスを追加
    $(".open").each(function(index, element){ //openクラスを取得
      var Title =$(element).children('.title'); //openクラスの子要素のtitleクラスを取得
      $(Title).addClass('close');       //タイトルにクラス名closeを付与し
      var Box =$(element).children('.box'); //openクラスの子要素boxクラスを取得
      $(Box).slideDown(500);          //アコーディオンを開く
    });
  });