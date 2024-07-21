$(function () {
  $('.nav-btn').click(function () {        //ハンバーガーボタン（.menu-trigger）をタップすると、
    $(this).toggleClass('active');              //タップしたハンバーガーボタン（.menu-trigger）に（.active）を追加・削除する。
    if ($(this).hasClass('active')) {           //もし、ハンバーガーボタン（.menu-trigger）に（.active）があれば、
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
