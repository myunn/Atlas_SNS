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
});

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
