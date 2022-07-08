(function MainMenu($) {
  const screen = $(window).width();

  function mainNav() {
    $('html').click(function fn() {
      // Hide the menus if visible.
      $('.main-menu__item--with-sub').removeClass('active');
    });

    $('.main-menu__item--with-sub > .main-menu__link').click(function fn(e) {
      $(this).parent().toggleClass('active');
      $(this).parent().siblings().removeClass('active');
      e.preventDefault();
      e.stopImmediatePropagation();
    });

    if (screen < 921) {
      const headerTopHeight = $('.header-top')?.height() || 0;
      const headerHeight = $('.header')?.height() || 0;
      const topMargin = headerTopHeight + headerHeight;
      const containerHeight = $(window).height() - topMargin;
      const mainNavContainer = $('.primary-header-menu');
      mainNavContainer.css({
        top: topMargin,
        height: containerHeight,
      });

      $('.hamburger__menu--open').click(function fn(e) {
        $(this)
          .closest('.header')
          .siblings('.container')
          .find('.primary-header-menu')
          .toggleClass('open-menu');
        $('body').toggleClass('active-menu');
        e.stopImmediatePropagation();
      });
    }
  }

  mainNav();

  $(window).on('load', function fn() {
    mainNav();
  });
})(jQuery, Attach);
