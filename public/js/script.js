// 記載：ハンバーガーメニュー（アニメーション的な動きを追加）
$(function () {
  $('.nav-btn').click(function () {        //ハンバーガーボタン（.nav-menu）をタップすると、
    $(this).slideToggleClass('active');              //タップしたハンバーガーボタン（.nav-menu）に（.active）を追加・削除する。
    if ($(this).hasClass('active')) {           //もし、ハンバーガーボタン（.nav-menu）に（.active）があれば、
      $('.nav-menu').addClass('active');          //(.g-navi)にも（.active）を追加する。
    } else {                                    //それ以外の場合は、
      $('.nav-menu').removeClass('active');       //(.g-navi)にある（.active）を削除する。
    }
  });
  // $('.nav-wrapper ul li a').click(function () { //各メニューリンク（.nav-wrapper ul li a）をタップすると、
  // $('.nav-btn').removeClass('active');   //ハンバーガーボタン（.menu-trigger）にある（.active）を削除する。
  // $('.nav-menu').removeClass('active');         //(.g-navi)にある（.active）も削除する。
  // });
});
