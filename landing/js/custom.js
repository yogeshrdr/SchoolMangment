$(document).ready(function(){
	"use strict";
	/*
	  ==============================================================
		   Search Script
	  ==============================================================
	*/
	$(".search-fld").on('click',function(){
		if($(this).hasClass('minus')){        
			$(this).toggleClass("plus minus");
			$('.search-wrapper-area').fadeOut();
		}else{
			$('.search-wrapper-area').fadeIn();
			$(this).toggleClass("minus plus");
		}
	});
		
	/*
	  ==============================================================
		   Bx-Slider Script
	  ==============================================================
	*/
	if($('.main_slider').length){
		$('.main_slider').bxSlider({
			speed:500,
			auto: true,				
			onSlideAfter: function(){
				$(".ct_banner_caption h4").addClass("animated fadeInDown");
				$(".ct_banner_caption span").addClass("animated fadeInDown");
				$(".ct_banner_caption h2").addClass("animated fadeInDown");
				$(".ct_banner_caption p").addClass("animated fadeInDown");
				$(".ct_banner_caption a").addClass("animated fadeInDown");
			},
			onSlideBefore: function(){
				$(".ct_banner_caption h4").removeClass("animated fadeInDown");
				$(".ct_banner_caption span").removeClass("animated fadeInDown");
				$(".ct_banner_caption h2").removeClass("animated fadeInDown");
				$(".ct_banner_caption p").removeClass("animated fadeInDown");
				$(".ct_banner_caption a").removeClass("animated fadeInDown");
			}
		});
	}
	/*
	  =======================================================================
		  		 Chosen Script Script
	  =======================================================================
	*/	
	if($(".chosen-select").length){
		$(".chosen-select").chosen()
	}
	/*
	  ==============================================================
		   Courses By Subject Script
	  ==============================================================
	*/
	if($('.courses_subject_carousel').length){
		$('.courses_subject_carousel').owlCarousel({
			loop:true,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			nav:true,
			responsive:{
				0:{items:1},
				480:{items:2},
				640:{items:3},
				760:{items:4},
				1000:{items:4},
				1200:{items:6},
				1600:{items:6}
			}
		})
	}
	
	/* ---------------------------------------------------------------------- */
	/*	DL Responsive Menu
	/* ---------------------------------------------------------------------- */
	if(typeof($.fn.dlmenu) == 'function'){
		$('#kode-responsive-navigation').each(function(){
			$(this).find('.dl-submenu').each(function(){
				if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
					var parent_nav = $('<li class="menu-item kode-parent-menu"></li>');
					parent_nav.append($(this).siblings('a').clone());
					
					$(this).prepend(parent_nav);
				}
			});
			$(this).dlmenu();
		});
	}
	
	/*
	  ==============================================================
		   Click to Scroll Top Script
	  ==============================================================
	*/
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.back_to_top').css('opacity','1');
			} else {
				$('.back_to_top').css('opacity','0');
			}
		});
		
		//Click event to scroll to top
		$('.back_to_top').on('click',function(){
			$('html, body').animate({scrollTop : 0},800);
			
		});
	
	/*
	  ==============================================================
		   Most Popular Courses Script
	  ==============================================================
	*/
	if($('.most_popular_courses').length){
		$('.most_popular_courses').owlCarousel({
			loop:true,
			autoplay:true,
			autoplayTimeout:4000,
			autoplayHoverPause:true,
			nav:true,
			responsive:{
				0:{items:1},
				480:{items:1},
				600:{items:2},
				1000:{items:2},
				1200:{items:3},
				1600:{items:3}
			}
		})
	}
	/*
	  ==============================================================
		   Testimonial Courses Script
	  ==============================================================
	*/
	if($('.testimonial_carousel').length){
		$('.testimonial_carousel').owlCarousel({
			loop:true,
			autoplay:true,
			autoplayTimeout:4000,
			autoplayHoverPause:true,
			nav:true,
			responsive:{
				0:{items:1},
				480:{items:1},
				600:{items:2},
				1000:{items:2},
				1200:{items:2},
				1600:{items:2}
			}
		})
	}
	
	/* ==================================================================
							Time Counter Script
	  	=================================================================	*/
		if($('.countdown').length){
			$('.countdown').downCount({ date: '08/08/2017 12:00:00', offset: +1 });
		}
		
	/* ==================================================================
					Number Count Up(WayPoints) Script
	  =================================================================	*/		
		if($('.counter').length){
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		}
		
	/* ==================================================================
					Testimonial Pager Script
	  =================================================================	*/
	  if($('.aside_test_slider').length){	
		$('.aside_test_slider').bxSlider({
		  pagerCustom: '#bx-pager'
		});
	  }
	/* ==================================================================
					Accordian Script
	  =================================================================	*/
	if($('.accord_hdg').length){
		//custom animation for open/close
		$.fn.slideFadeToggle = function(speed, easing, callback) {
		  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};

		$('.accord_hdg').accordion({
		  defaultOpen: '#accord1',
		  cookieName: 'nav',
		  speed: 'slow',
		  animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  },
		  animateClose: function (elem, opts) { //replace the standard slideDown with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  }
		});
	}
	
	if($('.accord_list_1').length){
		//custom animation for open/close
		$.fn.slideFadeToggle = function(speed, easing, callback) {
		  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};

		$('.accord_list_1').accordion({
		  defaultOpen: '#accord_1',
		  cookieName: 'nav',
		  speed: 'slow',
		  animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  },
		  animateClose: function (elem, opts) { //replace the standard slideDown with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  }
		});
	}
	
	/*
	  =======================================================================
		  		 Pretty Photo Script
	  =======================================================================
	*/
	if($("a[data-rel^='prettyPhoto']").length){
		$("a[data-rel^='prettyPhoto']").prettyPhoto();
	}
	
	/*
	  =======================================================================
		  		Map Script Script
	  =======================================================================
	*/
	if($('#map-canvas').length){
		google.maps.event.addDomListener(window, 'load', initialize);
	}
	
/*
  =======================================================================
			Google Map Function
  =======================================================================
*/
function initialize() {
	var MY_MAPTYPE_ID = 'custom_style';
	var map;
	var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
	var featureOpts = [
		{
		"featureType": "road",
		"elementType": "geometry",
		"stylers": [
			{
				"lightness": 100
			},
			{
				"visibility": "simplified"
			}
		]
	},
	{
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [
			{
				"visibility": "on"
			},
			{
				"color": "#C6E2FF"
			}
		]
	},
	{
		"featureType": "poi",
		"elementType": "geometry.fill",
		"stylers": [
			{
				"color": "#C5E3BF"
			}
		]
	},
	{
		"featureType": "road",
		"elementType": "geometry.fill",
		"stylers": [
			{
				"color": "#D1D1B8"
			}
		]
	}
	];	

	var mapOptions = {
		zoom: 13,
		scrollwheel: false,
		center: brooklyn,
		mapTypeControlOptions: {
		  mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};


	map = new google.maps.Map(document.getElementById('map-canvas'),
		  mapOptions);

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
	var marker=new google.maps.Marker({
	  position:brooklyn,
	  icon:''
	  });

	marker.setMap(map);
}


});