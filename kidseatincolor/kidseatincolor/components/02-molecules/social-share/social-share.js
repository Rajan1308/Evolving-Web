(function socialShare($) {
  const screen = $(window).width();

  function socialCollapse() {
    $('#social-block').click(function fn() {
      if (screen < 921) {
        if ($('#icon-block').css('display') === 'none') {
          $('#icon-block').css({
            display: 'block',
            height: 'auto',
          });
          $('#print-block').css({
            display: 'block',
          });
          $('.plus-block').css({
            height: '20px',
            bottom: '52px',
          });
          $('.plus-block').html('-');
        } else {
          $('#icon-block').css({
            display: 'none',
            height: '0',
            padding: '0',
          });
          $('#print-block').css({
            display: 'none',
          });
          $('.plus-block').css({
            height: '0',
            bottom: '20px',
          });
          $('.plus-block').html('+');
        }
      }
    });
  }

  socialCollapse();

  $(window).on('load', function fn() {
    socialCollapse();
  });
})(jQuery, Attach);
