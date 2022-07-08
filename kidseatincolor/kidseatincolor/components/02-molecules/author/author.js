(function author($) {
  const screen = $(window).width();
  function showAuthor() {
    $('#show-more-content').hide();
    $('#show-more').click(function fn() {
      $('#show-more-content').show();
      $('#show-less').show();
      $('#show-more').hide();
    });

    $('#show-less').click(function fn() {
      $('#show-more-content').hide();
      $('#show-more').show();
      $(this).hide();
    });
  }
  showAuthor();
  $(window).on('load', function fn() {
    if (screen < 768) {
      showAuthor();
    }
  });
})(jQuery, Attach);
