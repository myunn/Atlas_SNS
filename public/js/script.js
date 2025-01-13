// 記載)ハンバーガーメニュー（アニメーション的な動きを追加）
$(function () {
  $('.nav-btn').click(function () {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.nav-menu').addClass('active');
    } else {
      $('.nav-menu').removeClass('active');
    }
  });
  // $('.nav-wrapper ul li a').click(function () { //各メニューリンク（.nav-wrapper ul li a）をタップすると、
  // $('.nav-btn').removeClass('active');   //ハンバーガーボタン（.menu-trigger）にある（.active）を削除する。
  // $('.nav-menu').removeClass('active');         //(.g-navi)にある（.active）も削除する。
  // });
});

//記載) モーダル機能の動き追加
//要素を取得
// const modal = document.querySelectorAll('.js-modal'),
//   open = document.querySelectorAll('.js-modal-open'),
//   close = document.querySelectorAll('.js-modal-close');

// //「開くボタン」をクリックしてモーダルを開く
// function modalOpen() {
//   modal.classList.add('is-active');
//   var post = $(this).attr('post');
//   var post_id = $(this).attr('post_id');
//   $('.modal_post').val(post);
//   $('.modal_id').val(post_id);
// }
// open.addEventListener('click', modalOpen);

// //「閉じるボタン」をクリックしてモーダルを閉じる
// function modalClose() {
//   modal.classList.remove('is-active');
// }
// close.addEventListener('click', modalClose);

// //「モーダルの外側」をクリックしてモーダルを閉じる
// function modalOut(e) {
//   if (e.target == modal) {
//     modal.classList.remove('is-active');
//   }
// }
// addEventListener('click', modalOut);
// 記載）モーダル処理用の記載（コメント・idを引っ張ってきて表示させる）
$(function () {
  $(".js-modal-open").on("click", function () {
    $(".js-modal").addClass("is-active");
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');
    $('.modal_post').val(post);
    $('.modal_id').val(post_id);
    return false;
  });
  // $(".js-modal").on("click", function () {
  //   $(".js-modal").removeClass("is-active");
  //   return false;
  // });
});
