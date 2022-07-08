/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */





// JavaScript Document
jQuery(document).ready(function ($) {


    jQuery(".toshiba_contact_phone,.toshiba_career_phone ,.toshiba_dealer_phone ,.toshiba_service_phone ,.toshiba_sales_phone").keypress(phone_number_validation);
    jQuery(".toshiba_contact_fname ,.toshiba_contact_lname").keypress(text_field_validate);
    jQuery(".dealer_enq_fname ,.dealer_enq_lname").keypress(text_field_validate);
    jQuery(".toshiba_career_fname ,.toshiba_career_lname").keypress(text_field_validate);
    jQuery(".toshiba_service_fname  ,.toshiba_service_lname ").keypress(text_field_validate);
    jQuery(".toshiba_sales_fname  ,.toshiba_sales_lname ").keypress(text_field_validate);

    jQuery('.toshiba_career_cv').append(jQuery('.after_cv'));
    jQuery('.toshiba_career_coverletter').append(jQuery('.after_cover'));

    jQuery(document).find('.after_cv').click(function () {
        jQuery('#toshiba_career_cv').trigger('click');
    });
    jQuery(document).find('#toshiba_career_cv').change(function () {
        var file = jQuery(this).val().replace(/C:\\fakepath\\/ig, '');
        jQuery(".after_cv").text(file);
    });
    jQuery(document).find('.after_cover').click(function () {
        jQuery('#toshiba_career_coverletter').trigger('click');
    });
    jQuery(document).find('#toshiba_career_coverletter').change(function () {
        var file = jQuery(this).val().replace(/C:\\fakepath\\/ig, '');
        jQuery(".after_cover").text(file);
    });


    jQuery('ul.tabs li').hover(function () {
        var tab_id = jQuery(this).attr('data-tab');

        jQuery('ul.tabs li').removeClass('current');
        jQuery('.tab-content').removeClass('current');

        jQuery(this).addClass('current');
        jQuery("#" + tab_id).addClass('current');
    })

//     jQuery('.tab_last').first().addClass('active'); 
    jQuery('.tabbing .tabs li').first().addClass('active');
    jQuery('.tab_drawer_heading').first().addClass('d_active');

    jQuery('.right_inner .tab-content').first().addClass('current');
    jQuery('.left_inner .tab-link').first().addClass('current');
    jQuery('.left_inner .tab-link').last().addClass('tab_last');

    jQuery(this).parent('.tabs').siblings('li').first().addClass('active');
    if (jQuery(window).width() < 767) {

        jQuery('.menu li:has(ul)').addClass('parent');

        jQuery('a.menulinks').click(function () {
            jQuery(this).next('ul').slideToggle(250);
            jQuery('body').toggleClass('mobile-open');
            jQuery('.menu li.parent ul').slideUp(250);
            jQuery('a.child-triggerm').removeClass('child-open');
            return false;
        });

        jQuery('.menu li.parent > a').after('<a class="child-triggerm"><span></span></a>');

        jQuery('.menu a.child-triggerm').click(function () {
            jQuery(this).parent().siblings('li').find('a.child-triggerm').removeClass('child-open');
            jQuery(this).parent().siblings('li').find('ul').slideUp(250);
            jQuery(this).next('ul').slideToggle(250);
            jQuery(this).toggleClass('child-open');
            return false;
        });
    }

    jQuery('.banner_inner_slide').slick({
        infinite: true,
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 500,
        fade: true
    });

    jQuery('.multifunction_printers_section_slide').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        dots: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    arrows: true,
                    centerMode: true,
                    // autoplay: true,
                    // autoplaySpeed: 2000,
                    dots: false,
                    slidesToShow: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    centerMode: true,
                    slidesToShow: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    centerMode: true,
                    slidesToShow: 1
                }
            }]
    });


    jQuery('.Read_the_next_blog').slick({
        infinite: true,
        slidesToShow: 2,
        autoplaySpeed: 2000,
        autoplay: true,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    if (jQuery(document).find('.media_center_section .media_center_in ').length > 3) {
        jQuery('body').find(".media_center_section").addClass("media_center_slider");
        jQuery('.media_center_section').slick({
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 3,
            dots: true,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        autoplay: true,
                        autoplaySpeed: 2000,
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1,
                        dots: true,
                    }
                }, {
                    breakpoint: 480,
                    settings: {

                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1
                    }
                }]
        });
    }

    /* 
     * Update Cities list in contact form 
     */
    //toshiba_sales_country
    /* 
    $.getJSON("https://countriesnow.space/api/v0.1/countries/", function (data) {
        var country = data.country_name;
        var ip = data.ip;
        // console.log(ip);
        // console.log(country);
    });
    var country_city;
    jQuery.ajax({
        dataType: 'json',
        url: "https://countriesnow.space/api/v0.1/countries/",
        success: function (response) {
            country_city = response;
//            console.log(response.ip);
            var country = jQuery('#toshiba_countries').val();
            if (country) {
                if (country.indexOf('(') > -1) {
                    var sub_str_len = country.indexOf("(") - 1;
                } else {
                    var sub_str_len = country.length;
                }
                var country_name = country.substring(0, sub_str_len);
            }
            jQuery(country_city.data).each(function (i, value) {
                var sel_country = value.country;
                jQuery('.sales-enquiry-form #toshiba_sales_country').append('<option value="' + sel_country + '">' + sel_country + '</option>');
                if (country) {
                    if (sel_country == country_name) {
                        var cities = value.cities;
                        jQuery(cities).each(function (id, option) {
                            jQuery('#toshiba_cities').append('<option value="' + option + '">' + option + '</option>');
                        });
                        return;
                    }
                }
            });
        }
    });
    jQuery(document).on('change', '#toshiba_countries', function () {
        var country = jQuery('#toshiba_countries').val();
        if (country.indexOf('(') > -1) {
            var sub_str_len = country.indexOf("(") - 1;
        } else {
            var sub_str_len = country.length;
        }
        var country_name = country.substring(0, sub_str_len);
        jQuery('#toshiba_cities').find('option').not(':first').remove();
        jQuery(country_city.data).each(function (i, value) {
            var sel_country = value.country;
            if (sel_country == country_name) {
                var cities = value.cities;
                jQuery(cities).each(function (id, option) {
                    jQuery('#toshiba_cities').append('<option value="' + option + '">' + option + '</option>');
                });
                return false;
            }
        });
    });

    */

    // tabbed content
    jQuery(".tab_content").hide();
    jQuery(".tab_content:first").show();

    /* if in tab mode */
    jQuery("ul.tabs li").click(function () {

        jQuery(".tab_content").hide();
        var activeTab = jQuery(this).attr("rel");
        jQuery("#" + activeTab).fadeIn();

        jQuery("ul.tabs li").removeClass("active");
        jQuery(this).addClass("active");

        jQuery(".tab_drawer_heading").removeClass("d_active");
        jQuery(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

    });
    /* if in drawer mode */
    jQuery(".tab_drawer_heading").click(function () {

        jQuery(".tab_content").hide();
        var d_activeTab = jQuery(this).attr("rel");
        jQuery("#" + d_activeTab).fadeIn();

        jQuery(".tab_drawer_heading").removeClass("d_active");
        jQuery(this).addClass("d_active");

        jQuery("ul.tabs li").removeClass("active");
        jQuery("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
    });


    jQuery('ul.tabs li').last().addClass("tab_last");



    if (jQuery(window).width() < 767) {
        jQuery(document).find("#menu-primary-menu").hide();
        var menu_html = jQuery(document).find("#menu-primary-menu").html();
        jQuery(document).find("#menu-header-menu").prepend(menu_html);

        $(window).scroll(function () {
            if ($(window).scrollTop() >= 100) {
                $('.heade_section').addClass('fixed-nev_bar');
            } else {
                $('.heade_section').removeClass('fixed-nev_bar');
            }
        });
		jQuery(".icon").prependTo(".Policy").insertAfter('#menu-footer-menu');
		
		
		jQuery(document).ready(function($){
			$(window).scroll(function(){
				if ($(this).scrollTop() > 150) {
					$('#backToTop').fadeIn('slow');
				} else {
					$('#backToTop').fadeOut('slow');
				}
			});
			$('#backToTop').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 500);
				return false;
			});
		});

    }


    $('.faq__title').click(function (e) {
        e.preventDefault();

        // Toggle class on parent to open and slide up (close) all sibling content
        $(this).parent().siblings().removeClass('faq__item--open').children('.faq__content').slideUp(300);

        // Open clicked sibling content and Add class to parent element
        $(this).siblings().slideDown(300).parent().addClass('faq__item--open');
    });

    $('.faq__content h6').click(function () {

        // Toggle class on parent to open and slide up (close) all sibling content
        $('.faq__item').removeClass('faq__item--open').children('.faq__content').slideUp(300);

        // Open clicked sibling content and Add class to parent element
        // $(this).siblings().slideDown(300).parent().addClass('faq__item--open');
    });

    function text_field_validate(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return true;
        } else {
            return false;
        }
    }
    ;
    function phone_number_validation(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    }
    ;
    equalheight('.media_center_section .media_center_in .content .title');




    /*
     * pdf download on form submit
     */
    jQuery(document).on('click', '#downloadpdf', function () {
        var pdf_url = jQuery(this).attr('href');
        var hidden = jQuery('.download_broch_form .toshiba_brochure_file_url').val(pdf_url);
//        var hidden = jQuery(this).parents('.printers_inner').find('.download_broch_form .toshiba_brochure_file_url');
//        console.log(hidden);
    });
    jQuery(document).on('wpcf7mailsent', function (event) {
        if (event.detail.contactFormId == '2286') {
			
			
            jQuery.each(event.detail.inputs, function (index, val) {
				
                var field_name = val.name;
                if (field_name == "toshiba_brochure_file_url") {
                    var file_url = val.value;
                    /////// simple redirect /////// 
                    var win = window.open(file_url, '_blank');
					jQuery(".fancybox-button").trigger("click");
					 			
                    if (win) {
                        //Browser has allowed it to be opened
                        win.focus();
                    } else {
                        //Browser has blocked it
                        alert('Please allow popups for this website');
                    }
                    //////////  create anchor tag and click on it to download or redirect //////////
//                    var link = document.createElement('a');
//                    link.href = file_url;
//                    link.target = "_blank";
////                    link.download = "download";
//                    document.body.appendChild(link);
//                    link.click();
//                    link.href = '';
                }
            });
        }
    });

    jQuery(".mobile_search").click(function(){
        jQuery(".header_menu_right .Search form").toggleClass("visible");
    });
});//document.ready end here


equalheight = function (container) {
    var currentTallest = 0, currentRowStart = 0, rowDivs = new Array(), $el, topPosition = 0;
    jQuery(container).each(function () {
        $el = jQuery(this);
        jQuery($el).height('auto')
        topPostion = $el.position().top;
        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].outerHeight(currentTallest);
            }
            rowDivs.length = 0; // empty the array 
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}
jQuery(window).on('load', function () {
    equalheight('.media_center_section .media_center_in .content .title');

});



jQuery(window).resize(function () {
    equalheight('.media_center_section .media_center_in .content .title');

});

jQuery(document).ready(function ($) {
    function showPopup(whichpopup) {
        var docHeight = $(document).height();
        var scrollTop = $(window).scrollTop();
        $(".overlay-bg").show().css({height: docHeight});
        $(".popup" + whichpopup)
                .show()
                .css({top: scrollTop + 20 + "px"});
    }
    // function to close our popups
    function closePopup() {
        $(".overlay-bg, .overlay-content").hide();
    }
    $(".show-popup").click(function (event) {
        $('body').addClass("over")
        event.preventDefault();
        var selectedPopup = $(this).data("showpopup");
        showPopup(selectedPopup);
    });
    $(".close-btn, .overlay-bg").click(function () {
        $('body').removeClass("over")
        closePopup();
    });
    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            closePopup();
        }
    });
});


jQuery(document).ready(function () {
	
	
	
	
    jQuery('form').attr('autocomplete', 'off');
    jQuery('#help-3 a').click(function () {
        jQuery("#toshiba_contact_service").val("Service");
    });
    jQuery('#help-4 a').click(function () {
        jQuery("#toshiba_contact_service").val("General");
    });

	if (jQuery(window).width() < 767) {		
		jQuery("div.header_menu_right").appendTo("#menu-header-menu");
		jQuery("div.Search").appendTo("#menu-header-menu").insertBefore("#menu-header-menu > li:first-child");
	};
	
	jQuery(document).ready(function() {
	jQuery('.footer_section .menu-item-has-children > a').removeAttr("href");
    
	jQuery('.footer_section .menu-item-has-children').click(function() {
		jQuery('.footer_section .menu-item-has-children > .sub-menu').each(function(e) {			
			if(jQuery('.footer_section .menu-item-has-children > .sub-menu').hasClass('visible')){
			   jQuery(this).removeClass("visible");
			}
		});
		jQuery(this).children('.sub-menu').toggleClass('visible');			
    });
		
		jQuery('ul.sub-menu.visible .menu-item-has-children').on('click' ,function() {
			console.log(this);
			jQuery(this).children('.sub-menu').toggleClass('visible');			
		});
    
// 		var subsbu = jQuery('.footer_section .sub-menu.visible .menu-item-has-children');
// 		jQuery(subsbu).click(function(e) {
// 			console.log(subsbu);
// 		     jQuery(this).children('.sub-menu').addClass('visible');		
// 		});
		
// 		jQuery(document).ready(function($){ 
// 			jQuery( '.footer_section .menu-item-has-children' ).click( function(){
// 				jQuery(this).find('ul.sub-menu').show();
// 				jQuery(this).find('ul.sub-menu').find('ul.child').hide();
// 			}, function(){
// 				jQuery(this).find('.sub-menu').hide();
// 				});
// 		});
	
	jQuery('.footer_section .menu-item-has-children > a').removeAttr("href");
});
});
// jQuery( document ).ajaxComplete(function() {
//   jQuery('[type=hidden].wpcf7-dynamichidden').removeAttr('size');
// });

// window.onload = function() { 
// var a = document.querySelector('input[type=hidden].wpcf7-dynamichidden');
// a.setAttribute('size','auto'); // <<< set size as wished
// }
    


