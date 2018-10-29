(function($){
    "use strict";
    jQuery(document).on('ready', function(){
        // Homepage Slider
        $(".homepage-slides").owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            touchDrag: false,
            mouseDrag: false,
            autoplay: true,
            smartSpeed: 500,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        });
        
        $(".homepage-slides").on("translate.owl.carousel", function(){
            $(".single-slider-item h1, .single-slider-item p").removeClass("animated fadeInUp").css("opacity", "0");
            $(".single-slider-item .slide-btn").removeClass("animated fadeInDown").css("opacity", "0");
        });
        
        $(".homepage-slides").on("translated.owl.carousel", function(){
            $(".single-slider-item h1, .single-slider-item p").addClass("animated fadeInUp").css("opacity", "1");
            $(".single-slider-item .slide-btn").addClass("animated fadeInDown").css("opacity", "1");
        });
        
        // COUNTER NUMBER
        $('.counter-number').counterUp({
            delay: 10,
            time: 1000,
        });
        
        // Shop Slides
        $(".shop-slides").owlCarousel({
            items: 4,
            nav: true,
            margin: 30,
            dots: false,
            autoplay: false,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                650:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });
        
        // testimonial Slides
        $(".testimonial-slides").owlCarousel({
            items: 2,
            nav: false,
            margin: 30,
            dots: false,
            autoplay: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:2
                }
            }
        });
        
        // Team Slides
        $(".team-slides").owlCarousel({
            items: 4,
            nav: true,
            margin: 30,
            dots: false,
            autoplay: false,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });
        
        // Single Blog Slides
        $(".blog-slides").owlCarousel({
            items: 1,
            nav: true,
            margin: 0,
            dots: false,
            autoplay: false,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            
        });
        
        // Client Slides
        $(".client-slides").owlCarousel({
            dots: false,
            autoplay: true,
            loop: true,
            margin:30,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        });
        
        // Sticky Menu
 
        // grab the initial top offset of the navigation 
        var sticky_navigation_offset_top = $('.mainmenu-area').offset().top;

        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var sticky_navigation = function(){
            var scroll_top = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scroll_top > sticky_navigation_offset_top) { 
                $('.mainmenu-area').css({ 'position': 'fixed', 'top':0, 'left':0, 'width': '100%', 'z-index': '1000'}).addClass('now-visible');
            } else {
                $('.mainmenu-area').css({ 'position': 'relative' }).removeClass('now-visible'); 
            }   
        };

        // run our function on load
        sticky_navigation();

        // and run it again every time you scroll
        $(window).scroll(function() {
             sticky_navigation();
        });

        
        //Back to top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1500);
            });
        }
        
        //Search form on menubar
        $("#inpt_search").on('focus', function () {
            $(this).parent('label').addClass('active');
        });

        $("#inpt_search").on('blur', function () {
            if($(this).val().length == 0)
                $(this).parent('label').removeClass('active');
        });
        
        // This will create a single gallery from all elements that have class "gallery-item"
        $(".gallery-item, .lightbox-gallery").magnificPopup({
          type: 'image',
          gallery:{
            enabled:true,
          }
        });
       
        // This will create a single gallery from all elements that have class "gallery-item"
          $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
        });
        
         // Shorting
        $(".shorting").mixItUp();
        
        // Mobile Menu
        $("ul#navigation").slicknav({
            prependTo: ".responsive-menu-wrap",
        });
        
        //FAQ 
        $(".faq-q").on('click', function () {
          var container = $(this).parents(".faq-c");
          var answer = container.find(".faq-a");
          var trigger = container.find(".faq-t");

          answer.slideToggle(200);

          if (trigger.hasClass("faq-o")) {
            trigger.removeClass("faq-o");
          }
          else {
            trigger.addClass("faq-o");
          }
        });
        
        //Wow Js
        new WOW().init();
        
    });
    
    jQuery(window).on('load',function(){
        jQuery(".cleaning-slide-preloader-wrap, .cleaning-site-preloader-wrap").fadeOut(500);
    });
    
    	/* ======== Send Mail ============*/
	$('#contatc_form').submit(function(event) {
	    event.preventDefault();
	    var name = $('#contact_name').val();
	    var email = $('#contact_email').val();
	    var sub = $('#contact_subject').val();
	    var phone = $('#contact_phone').val();
	    var message = $('#contact_message').val();
		var recaptcha = $("#g-recaptcha-response").val();
		
	    if(name == "" || email == "" || message == "" || name == " " || message == " " || recaptcha == " " || sub == " " || phone ==" "){
	    	jQuery('#contact_send_status').removeClass('message_send');
		   	jQuery('#contact_send_status').addClass('message_notsend');
			jQuery('#contact_send_status').text('Please fill all fields with correct data.');
	    }else{
		    var formData = $('#contatc_form').serialize();
		    $.ajax({
			    type: 'POST',
			    url: $('#contatc_form').attr('action'),
			    data: formData,
				success:function(data){  
					jQuery('form[name="myform"]')[0].reset();
				},
			})
			.done(function(response) {
				$('#contact_send_status').removeClass('message_notsend');
			   	$('#contact_send_status').addClass('message_send');
			   	$('#contact_send_status').html("<div class='alert alert-success' role='alert'>Your email successfully Sent ! Thank you.</div>");
				$("#contact_send_status").fadeOut(3000);				
			})
			.fail(function(data) {
				jQuery('#contact_send_status').removeClass('message_send');
			   	jQuery('#contact_send_status').addClass('message_notsend');
				jQuery('#contact_send_status').html("<div class='alert alert-danger' role='alert'>Something wrong please try again!</div>");
			});
		}
	});
    
}(jQuery));