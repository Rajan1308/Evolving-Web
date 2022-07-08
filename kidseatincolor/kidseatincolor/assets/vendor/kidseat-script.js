/* eslint-disable prettier/prettier */
// eslint-disable-next-line prettier/prettier
(function ($) {
	// eslint-disable-next-line no-undef
	AOS.init({ duration: 1200 });

	// fab to fa
	$('.fa-envelope').removeClass('fab').addClass('fa');
	$('.owl-carousel.teampromo').owlCarousel({
		items: 4,
		loop: $('.item').length > 4,
		center: false,
		margin: 20,
		autoplay: !1,
		autoplayTimeout: 1500,
		autoplayHoverPause: !0,
		smartSpeed: 1200,
		dots: !1,
		nav: !0,
		navText: [
			"<i class='fal fa-chevron-left'></i>",
			"<i class='fal fa-chevron-right'></i>",
		],
		responsiveClass: !0,
		responsive: {
			1024: {
				items: 4,
				loop: $('.item').length > 4,
			},
			768: {
				items: 2,
				loop: $('.item').length > 2,
			},
			0: {
				items: 2,
				loop: $('.item').length > 2,
				dots: true,
				nav: false,
			},
		},
	});

	$('.owl-carousel.testimonials').owlCarousel({
		items: 1,
		loop: $('.item').length > 1,
		center: !1,
		loop: true,
		margin: 20,
		smartSpeed: 1200,
		dots: !1,
		nav: !0,
		navText: [
			"<i class='fal fa-chevron-left'></i>",
			"<i class='fal fa-chevron-right'></i>",
		],
		responsiveClass: !0,
		responsive: {
			721: {
				items: 1,
				loop: $('.item').length > 1,
			},
			0: {
				items: 1,
				loop: $('.item').length > 1,
				dots: true,
				nav: false,
			},
		},
	});

	$('.product-listing__wp-content.owl-carousel').owlCarousel({
		items: 4,
		loop: false,
		rewind: true,
		center: !1,
		margin: 20,
		smartSpeed: 1200,
		dots: !1,
		nav: !0,
		navText: [
			"<i class='fal fa-chevron-left'></i>",
			"<i class='fal fa-chevron-right'></i>",
		],
		responsiveClass: !0,
		responsive: {
			921: {
				items: 4,
			},
			721: {
				items: 3,
			},
			0: {
				items: 2,
				dots: true,
				nav: false,
			},
		},
	});

	if ($(window).width() < 980) {
		$('.logo-itmes.owl-carousel').owlCarousel({
			items: 6,
			loop: $('.item').length > 6,
			center: !1,
			loop: true,
			margin: 20,
			smartSpeed: 1200,
			dots: true,
			nav: false,
			responsive: {
				721: {
					items: 4,
					loop: $('.item').length > 4,
				},
				450: {
					items: 3,
					loop: $('.item').length > 3,
				},
				0: {
					items: 2,
					loop: $('.item').length > 2,
				},
			},
		});
	}

	if ($(window).width() < 980) {
		$('.featured-content-block .owl-carousel').owlCarousel({
			items: 2,
			loop: $('.item').length > 2,
			center: !1,
			loop: true,
			margin: 20,
			smartSpeed: 1200,
			dots: true,
			nav: false,
			responsive: {
				721: {
					items: 2,
					loop: $('.item').length > 4,
				},
				450: {
					items: 1,
					loop: $('.item').length > 3,
				},
				0: {
					items: 1,
					loop: $('.item').length > 2,
				},
			},
		});
	}

	$('div.woocommerce').on('click', 'input.qty', function () {
		$("[name='update_cart']").trigger('click');
	});

	$(document).on('change', '.variation-radios input', function () {
		$('.variation-radios input:checked').each(function (index, element) {
			const $el = $(element);
			const thisName = $el.attr('name');
			const thisVal = $el.attr('value');
			$(`select[name="${thisName}"]`).val(thisVal).trigger('change');
		});
	});

	// Setting the default variation id On the page load
	// $(document).('.variation-radios input', function () {
	$('.variation-radios input:checked').each(function (index, element) {
		const $el = $(element);
		const thisName = $el.attr('name');
		const thisVal = $el.attr('value');
		$(`select[name="${thisName}"]`).val(thisVal).trigger('change');
	});
	// });

	$(document).on('woocommerce_update_variation_values', function () {
		$('.variation-radios input').each(function (index, element) {
			const $el = $(element);
			const thisName = $el.attr('name');
			const thisVal = $el.attr('value');
			$el.removeAttr('disabled');
			if (
				$(`select[name="${thisName}"] option[value="${thisVal}"]`).is(
					':disabled',
				)
			) {
				$el.prop('disabled', true);
			}
		});
	});

	// $(document).ready(function(e){

	//   let default_price = $("input[name='attribute_price']:checked").attr('value');
	//   let price_parts = default_price.split("-");
	//   let selected_price = price_parts[0].trim();
	//   const cart_button = $('.variations_button .single_add_to_cart_button');
	//   let cart_button_text = cart_button.text();
	//   if (cart_button_text.indexOf('$') == -1) {
	//     cart_button.text(cart_button_text + ' - ' + selected_price);
	//   }
	//   $('.woocommerce-Price-amount').html('<bdi>' + selected_price + '</bdi>');
	// });
	// eslint-disable-next-line camelcase
	function blogs_listing_data() {
		jQuery('div.loader').show();
		let paged = parseInt(jQuery('#paged').val());

		$.ajax({
			type: 'GET',
			url: ajax_url,
			dataType: 'json',
			data: $('#blog_listing_render_filter_form').serialize(),
			beforeSend() {
				$('#spinloader').removeClass('hidden');
			},
			success(response) {
				$('div.loader').hide();
				$('#paged').val(response.paged);
				if (paged == 1) {
					$('.bloglisting-data-filter-block').html(response.data);
				} else {
					$('.bloglisting-data-filter-block').append(response.data);
				}
				if (response.max_pages == response.current_page || response.rows_found == 0) {
					$('.load-more-block').hide();
				} else {
					$('.load-more-block').show();
				}
				if (response.search && response.rows_found > 0) {
					$('.search-message').html('Showing results for "' + response.s + '"');
				}
				if (response.search == '' || null) {
					$('.search-message').html('');
				}
			},
			complete() {
				$('#spinloader').addClass('hidden');
			},
			error(data) {
				//alert('Your browser broke!');
				return false;
			},
		});
	}

	// eslint-disable-next-line func-names
	$('input#blogCatTerms, input#blogTagTerms').click(function (event) {
		event.stopPropagation();
		event.stopImmediatePropagation();
		//jQuery('#offset').val(0);
		jQuery('#paged').val(1);

		$('.bloglisting-data-filter-block').html('');
		jQuery('.load-more-block').show();
		blogs_listing_data();
	});

	if ($('.allBlogList')[0]) {
		blogs_listing_data();
	}

	// eslint-disable-next-line func-names
	$('#load-more').bind('click', function () {
		blogs_listing_data();
	});

	const mafs = $('#blog-listing-rendered-data');
	const mafsForm = mafs.find('form');
	// eslint-disable-next-line func-names
	mafsForm.submit(function (e) {
		e.preventDefault();
		blogs_listing_data();
	});

	jQuery('#clear-search').click(function fn() {
		$("#blog_listing_render_filter_form")[0].reset();
		jQuery('#paged').val(1);
		blogs_listing_data();
	});

	//Validate keyword is enter
	mafsForm.find('button').on('click', function () {
		jQuery('#paged').val(1);
	});

	// eslint-disable-next-line func-names
	if (document.querySelector('.product-listing__slider')) {
		new Glide('.product-listing__slider', {
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
		}).mount();
	}

	// eslint-disable-next-line func-names
	if (document.querySelector('.team-grid__slider')) {
		new Glide(document.querySelector('.team-grid__slider'), {
			perView: 2,
			type: 'slider',
		}).mount();
	}

	// const mouseEvent = e => {
	//     const shouldShowExitIntent = 
	//             !e.toElement && 
	//             !e.relatedTarget &&
	//             e.clientY < 10;

	//     if (shouldShowExitIntent) {
	//         document.removeEventListener('mouseout', mouseEvent);
	//         $('#evidenceBased').modal({
	//             show: true,
	//             backdrop: true
	//         });
	//     }
	// };

	// document.addEventListener('mouseout', mouseEvent);
	// On Single Blog About Boilerplate 
	const screen = jQuery(window).width();
	jQuery('#about-us-block').click(function fn() {
		if (screen < 921) {
			if (jQuery('#about-us-text').css('display') === 'none') {
				jQuery('#about-us-text').css({
					display: 'block',
					height: 'auto',
					padding: '10px',
				});
				jQuery('.about-us-arrow-down').css({
					display: 'none',
				});
				jQuery('.about-us-arrow-up').css({
					display: 'inline-block',
				});
			} else {
				jQuery('#about-us-text').css({
					display: 'none',
					height: '0',
					padding: '0',
				});
				jQuery('.about-us-arrow-down').css({
					display: 'inline-block',
				});
				jQuery('.about-us-arrow-up').css({
					display: 'none',
				});
			}
		}
	});
	// social share 
	jQuery('#social-block').click(function fn() {
		if (screen < 921) {
			if (jQuery('#icon-block').css('display') === 'none') {
				jQuery('#icon-block').css({
					display: 'block',
					height: 'auto',
				});
				jQuery('#print-block').css({
					display: 'block',
				});
				$('.plus-block').css({
					height: '20px',
					bottom: '52px',
				});
				jQuery('.plus-block').html('-');
			} else {
				jQuery('#icon-block').css({
					display: 'none',
					height: '0',
					padding: '0',
				});
				jQuery('#print-block').css({
					display: 'none',
				});
				$('.plus-block').css({
					height: '0',
					bottom: '20px',
				});
				jQuery('.plus-block').html('+');
			}
		}
	});

	//CRDEV
	//Single product testimonials
	if ($('.testimonial-grid').length) {

		//Main grid
		var testimonial_wrapper = $('.testimonial-grid .wrapper');
		if (testimonial_wrapper.find('.testimonial').length > 4) {
			testimonial_wrapper.next('#show-more').show();
		}
		$('.testimonial-grid .button').on('click', function () {
			$('.testimonial-grid').toggleClass('open');
			if ($(this).text() == 'Show More') {
				$(this).text("Show Less");
			} else {
				$(this).text("Show More");
			};
		});

		//Individual testimonial
		$('.testimonial').each(function () {
			var testimonial_content = $(this).find('.testimonial-content');
			if (testimonial_content.height() > 105) {
				testimonial_content.css('height', '95px');
				if ($(window).width() < 768) {
					testimonial_content.css('height', '85px');
				}
				testimonial_content.next('.show-more').show();
			}
		});
		$('.testimonial .show-more').on('click', function () {
			$(this).prev('.testimonial-content').toggleClass('open');
			if ($(this).text() == 'Show More') {
				$(this).text("Show Less");
			} else {
				$(this).text("Show More");
			};
		});
	}

	//Accordion
	if ($('.accordion-promo').length) {
		$('.accordion-question').on('click', function () {
			$(this).toggleClass('open');
			$(this).next('.accordion-answer').slideToggle();
		});
	}

	//on product purchase option changes
	if($('.product-purchase-options').length){
		$('.product-purchase-options label').on('click', function(){
			payment_plan = $('.product-purchase-option.active .product-purchase-option-price').html();
			$('.single_add_to_cart_button').html('Purchase Now - ' + payment_plan);
		});
	}

	//On variation change
	if ($('.variations_form').length) {
		$('.variation-radios label').on('click', function () {
			/*var price = $(this).find('b').text();
			$('.single_add_to_cart_button .variation-price').text(price);
			$('.woocommerce-Price-amount bdi').html(price);*/
			$(".single_variation_wrap").on("show_variation", function (event, variation) {
				if (jQuery('.post-9508 .single_add_to_cart_button, .postid-10964 .single_add_to_cart_button').length) {
					$('.single_add_to_cart_button').text('Compra Ahora - $' + variation.display_price);
				} else {
					$('.single_add_to_cart_button').text('Purchase Now - $' + variation.display_price);
				}
				$('.woocommerce-Price-amount bdi').text('$' + variation.display_price);
			});
		});

		jQuery('.post-9508 .single_add_to_cart_button, .postid-10964 .single_add_to_cart_button').each(function () {
			var text = jQuery(this).text().replace('Purchase Now -', 'Compra Ahora - ');
			jQuery(this).text(text);
		});

		//Update if variation comes from url
		const queryString = window.location.search;
		const params = new URLSearchParams(queryString);
		params.forEach(function (value, key) {
			if (key.startsWith('attribute_')) {
				$('.single_add_to_cart_button').text('Purchase Now - ' + value);
				$('.woocommerce-Price-amount bdi').text(value);
			}
		});

		//if giftcard custom amount
		$('#pwgc-custom-amount').attr('placeholder', 'Custom');
		$('#pwgc-custom-amount').on('input', function () {
			var price = $(this).val();
			$('.single_add_to_cart_button').text('Purchase Now - $' + price);
			$('.woocommerce-Price-amount bdi').text('$' + price);
		});
	}

	//Check for product page 
	// if ($('.post-10494').length) {
	// 	if (jQuery('.post-10494 .single_add_to_cart_button, .postid-10494 .single_add_to_cart_button').length) {
	// 		$('.single_add_to_cart_button').text('Enroll Now');
	// 	}
	// }

	//Bundle accordion
	if ($('.bundle-promo').length) {
		$('.bundle-promo h6').on('click', function () {
			$(this).toggleClass('open');
			$('.bundle-promo-wrapper').slideToggle();
		});
	}

	//Custom product gallery slider
	if ($('.woocommerce-product-gallery__wrapper').length) {
		$('.woocommerce-product-gallery__wrapper').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.product-gallery-thumbs',
			adaptiveHeight: true
		});
		$('.product-gallery-thumbs').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: '.woocommerce-product-gallery__wrapper',
			dots: false,
			centerMode: true,
			focusOnSelect: true,
			infinite: true,
			centerPadding: '0',
			responsive: [
				{
					breakpoint: 990,
					settings: {
						slidesToShow: 3,
					}
				},
			]
		});
	}

	//Blog tems scroll
	if ($('.blog-term .scroll').length) {
		$('.blog-term .scroll').slick({
			dots: false,
			arrows: false,
			infinite: false,
			speed: 300,
			slidesToShow: 1,
			centerMode: false,
			variableWidth: true,
			adaptiveHeight: false,
		});
	}

	//Testimonial Cards Carousel
	if ($('.testimonial-card-carousel .testimonial').length) {
		$('.testimonial-card-carousel .testimonials').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			adaptiveHeight: false,
			dots: false,
			responsive: [
				{
					breakpoint: 920,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						centerMode: true,
						infinite: true,
						arrows: false,
						dots: true
					}
				},
			]
		});
		sameHeight('.testimonial-card-carousel .quote');
		$(window).resize(function () {
			sameHeight('.testimonial-card-carousel .quote');
		});
	}

	//Update plus minus quantity

	if ($('.quantity').length) {
		cart_update();
		$(document).on('updated_cart_totals', function () {
			cart_update();
		});
	}

	//Hide messages auto
	$('body').on('updated_checkout', function () {
		setTimeout(function () {
			$('.keic-checkout-review-order+.woocommerce-info').fadeOut('fast');
			$('.keic-checkout-review-order+.woocommerce-error').fadeOut('fast');
			$('.keic-checkout-review-order+.woocommerce-message').fadeOut('fast');
		}, 5000);
	});

	//Add woocommerce login form placeholder
	$('.woocommerce-form-login #username').attr('placeholder', '');
	$('.woocommerce-form-login #password').attr('placeholder', '');

	//Add toggle class coupon
	$('.show-pw-gift-card, .showcoupon').on('click', function () {
		$(this).parents('.woocommerce-form-coupon-toggle').toggleClass('open');
	});

	//Show hide review order mobile
	$('.review-order-toggle a').on('click', function () {
		var text = $(this).find('span');
		var label = text.text() == 'Show' ? 'Hide' : 'Show';
		text.text(label);
		$('.review-order-toggle').toggleClass('open');
		$('.review-order-content').slideToggle('fast');
	});

	//Same latest-articles height
	if ($('.latest-articles').length) {
		sameHeight('.latest-articles h5');
		$(window).resize(function () {
			sameHeight('.latest-articles h5');
		});
	}

	//View more search
	$('#view-more-search').on('click', function () {
		var params = $(this);
		search_pagination_ajax(params);
		return false;
	});

	function search_pagination_ajax(params) {
		var current = params.attr('data-current');
		var max = params.attr('data-max');
		var s = params.attr('data-search');
		$.ajax({
			type: 'GET',
			url: ajax_url,
			dataType: 'json',
			data: {
				action: 'search_pagination',
				current: current,
				max: max,
				s: s,
			},
			beforeSend() {
				$('#view-more-search').text('Loading');
			},
			success(response) {
				$('#view-more-search').text('View More');
				$('#view-more-search').attr("data-current", response.current);
				$('.search-result').append(response.data);

				if (response.current == max) {
					$('#view-more-search').slideUp();
				}

				if (response.debug) {
					console.log(response.debug);
				}
			},
			complete() {

			},
			error(data) {
				//alert('Your browser broke!');
				return false;
			},
		});
	}

	// View More on Archive page
	$('#view-more-archive-search').on('click', function () {
		var params = $(this);
		archive_pagination_ajax(params);
		return false;
	});

	function archive_pagination_ajax(params) {
		var current = params.attr('data-current');
		var max = params.attr('data-max');
		$.ajax({
			type: 'GET',
			url: ajax_url,
			dataType: 'json',
			data: {
				action: 'search_archive_pagination',
				current: current,
				max: max,
			},
			beforeSend() {
				$('#view-more-archive-search').text('Loading');
			},
			success(response) {
				$('#view-more-archive-search').text('View More');
				$('#view-more-archive-search').attr("data-current", response.current);
				$('.archive-page').append(response.data);

				if (response.current == max) {
					$('#view-more-archive-search').slideUp();
				}

				if (response.debug) {
					console.log(response.debug);
				}
			},
			complete() {

			},
			error(data) {
				//alert('Your browser broke!');
				return false;
			},
		});
	}

	//Same featured products height
	if ($('.featured-products').length) {
		sameHeight('.featured-products .product-short-description');
		sameHeight('.featured-products .woocommerce-loop-product__title');
		$(window).resize(function () {
			sameHeight('.featured-products .product-short-description');
			sameHeight('.featured-products .woocommerce-loop-product__title');
		});
	}
	//CRDEV /

	// Blog listing prefilters.
	let current_page = window.location.pathname;
	const listing_pages = ["/blog/", "/recipes/"];
	if (listing_pages.indexOf(current_page) !== -1) {
		$('.blog-section .search-section .item').each(function () {
			$(this).find('label span').on('click', function () {
				if ($(this).text() == 'All') {
					window.history.replaceState(null, null, window.location.pathname);
				} else {
					let selected_term = $(this).data('index');
					window.history.replaceState(null, null, "?uterm=" + selected_term);
				}
			});
		});
	}

})(jQuery);

//Cart update quantity
function cart_update() {
	$input = jQuery('.qty-item input.qty');
	jQuery('.quantity').on('click', '.minus', function (e) {
		let ele = jQuery(this).siblings('input.qty');
		var val = parseInt(ele.val());
		if (val > 0) {
			jQuery(this).siblings('input.qty').val(val - 1).change();
			jQuery("[name='update_cart']").click();
		}
	});
	jQuery('.quantity').on('click', '.plus', function (e) {
		let ele = jQuery(this).siblings('input.qty');
		var val = parseInt(ele.val());
		jQuery(this).siblings('input.qty').val(val + 1).change();
		jQuery("[name='update_cart']").click();
	});
}

//Same height script
function sameHeight(div, target) {
	if (!target) target = div;
	var maxHeight = -1;
	var item1 = jQuery(div);
	var item2 = jQuery(target);
	item2.attr('style', '');
	item1.each(function () {
		if (jQuery(this).innerHeight() > maxHeight) maxHeight = jQuery(this).innerHeight();
	});
	item2.each(function () {
		jQuery(this).innerHeight(maxHeight);
	});
}

// Cart QTY update by ajax
jQuery(document).ready(function () {
	jQuery('.inline-ad').each(function (index, value) {
		jQuery(this).removeClass('inline-ad').addClass('inline-ad-' + index);
	});
	jQuery('.inline-cta').each(function (index, value) {
		jQuery(this).removeClass('inline-cta').addClass('inline-cta-' + index);
	});
	jQuery('.inline-newsletter').each(function (index, value) {
		jQuery(this).removeClass('inline-newsletter').addClass('inline-newsletter-' + index);
	});
	jQuery('.inline-popup').each(function (index, value) {
		jQuery(this).removeClass('inline-popup').addClass('inline-popup-' + index);
	});



// fixing subscription plan product
var text = "or 2 payments of";
jQuery("li.subscription-option span.product-purchase-option-label").text(text);
jQuery('.product-purchase-option.subscription-option > label').on('click', function() {
  if (jQuery(this).parent().hasClass('active') && !jQuery(this).hasClass('active')) {
    jQuery(this).addClass('active');
    jQuery('.single_add_to_cart_button').trigger('click');
  }
});


});


  const screen = jQuery(window).width();
  function showAuthor() {
    jQuery('#show-more-content').hide();
    jQuery('#show-more').click(function fn() {
      jQuery('#show-more-content').show();
      jQuery('#show-less').show();
      jQuery('#show-more').hide();
    });

    jQuery('#show-less').click(function fn() {
      jQuery('#show-more-content').hide();
      jQuery('#show-more').show();
      jQuery(this).hide();
    });
  }

showAuthor();
jQuery(window).on('load', function fn() {
	if (screen < 768) {
		showAuthor();
	}
});


// Particular product Purchase Now label change (/product/sabores-para-todos/)

// jQuery(".wcsatt-options-product .one-time-option label span.product-purchase-option-label").text(function (index, text) {
// 	return text.replace("Pay Now", "Pay in Full");
// });
