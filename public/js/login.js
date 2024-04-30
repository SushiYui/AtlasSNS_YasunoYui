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