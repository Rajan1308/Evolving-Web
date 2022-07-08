(function MainMenu($) {
  const screen = $(window).width();

  function mobileCollapse() {
    $('#about-us-block').click(function fn() {
      if (screen < 921) {
        if ($('#about-us-text').css('display') === 'none') {
          $('#about-us-text').css({
            display: 'block',
            height: 'auto',
            padding: '10px',
          });
          $('.about-us-arrow-down').css({
            display: 'none',
          });
          $('.about-us-arrow-up').css({
            display: 'inline-block',
          });
        } else {
          $('#about-us-text').css({
            display: 'none',
            height: '0',
            padding: '0',
          });

          $('.about-us-arrow-down').css({
            display: 'inline-block',
          });
          $('.about-us-arrow-up').css({
            display: 'none',
          });
        }
      }
    });
  }

  mobileCollapse();

  $(window).on('load', function fn() {
    mobileCollapse();
  });
})(jQuery, Attach);
