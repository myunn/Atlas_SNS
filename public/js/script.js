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
const modal = document.querySelector('.js-modal'),
  open = document.querySelector('.js-modal-open'),
  close = document.querySelector('.js-modal-close');

//「開くボタン」をクリックしてモーダルを開く
function modalOpen() {
  modal.classList.add('is-active');
}
open.addEventListener('click', modalOpen);

//「閉じるボタン」をクリックしてモーダルを閉じる
function modalClose() {
  modal.classList.remove('is-active');
}
close.addEventListener('click', modalClose);

//「モーダルの外側」をクリックしてモーダルを閉じる
function modalOut(e) {
  if (e.target == modal) {
    modal.classList.remove('is-active');
  }
}
addEventListener('click', modalOut);
