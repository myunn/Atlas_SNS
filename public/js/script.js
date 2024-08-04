// 記載：ハンバーガーメニュー（アニメーション的な動きを追加）
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
