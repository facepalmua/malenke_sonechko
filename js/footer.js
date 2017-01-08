$(document).ready(function($) {

  $(window).on('scroll', function() {

    //ADD .TIGHT
    if ($(window).scrollTop() + $(window).height() > $('.wrapper-for-footer').outerHeight()) {
      $('body').addClass('tight');
    } else {
      $('body').removeClass('tight');
    }
  });

  //BACK TO PRESENTATION MODE
  $("html").on("click", "body.tight .wrapper-for-footer", function() {
    $('html, body').animate({
      scrollTop: $('.wrapper-for-footer').outerHeight() - $(window).height()
    }, 500);
  });

});