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


//   .edit-btnがbuttonであることを定義している
  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', () => {

        const postId = button.getAttribute('data-id');
        const postContent = button.getAttribute('data-content');

        // document.getElementById('content').text = postContent;
        // document.getElementById('edit-form').action = '/post/' + postId + '/edit';

        // モーダル内のテキストエリアに投稿内容を設定
        document.getElementById('content').value = postContent;

        // フォームのaction属性を設定
        document.getElementById('edit-form').action = '/post/' + postId + '/edit' ;

        // モーダルを表示
        document.getElementById('edit-modal').style.display = 'block';
    });
});

// モーダルの枠外をクリックすると編集機能をキャンセルできるようにする
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('edit-modal');
    const modalContent = document.querySelector('.modal-content');

    // モーダル枠外をクリックするとキャンセルする処理
    modal.addEventListener('click', function(event) {
        if (!modalContent.contains(event.target)) {
            modal.style.display = 'none';
        }
    });
});




