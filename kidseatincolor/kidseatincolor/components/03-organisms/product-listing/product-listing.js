import Glide from '@glidejs/glide';

export default new Glide('.product-listing__slider', {
  perView: 4,
  type: 'slider',
  breakpoints: {
    1080: {
      perView: '3',
    },
    880: {
      perView: '2',
    },
    560: {
      perView: '2',
      focusAt: 'center',
    },
  },
});
