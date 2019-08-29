/* ========================================================================= */
/* BE SURE TO COMMENT CODE/IDENTIFY PER PLUGIN CALL */
/* ========================================================================= */

jQuery(function($){


    // PARALLAX
/*
    $(document).scroll(function(){
        var nm = $("html").scrollTop();
        var nw = $("body").scrollTop();
        var n = (nm > nw ? nm : nw);

        $('#element').css({
            'webkitTransform' : 'translate3d(0, ' + n + 'px, 0)',
            'MozTransform'    : 'translate3d(0, ' + n + 'px, 0)',
            'msTransform'     : 'translateY('     + n + 'px)',
            'OTransform'      : 'translate3d(0, ' + n + 'px, 0)',
            'transform'       : 'translate3d(0, ' + n + 'px, 0)',
        });

        // if transform3d isn't available, use top over background-position
        //$('#element').css('top', Math.ceil(n/2) + 'px');

    });
*/



    /* ====== Twitter API Call =============================================
        Note: Script Automatically adds <li> before and after template. Don't forget to setup Auth info in /twitter/index.php */
    /*
    $('#tweets-loading').tweet({
        modpath: '/path/to/twitter/', // only needed if twitter folder is not in root
        username: 'jackrabbits',
        count: 1,
		template: '<p>{text}</p><p class="tweetlink">{time}</p>'
	});
    */
	 _search();
// _mobilemenu();
	 _gallerySlider();
	 _featuresFilter();
	 _faqsAccordion();
});

function _search(){
	$('.search-toggle').click(function(){
		$('.search-form').toggleClass('open');
		$('#search input').focus();
	});
}


// function _mobilemenu(){
// 	var menubox 	= $('#mobile-menu');//main menu wrap
// 	var menu_btn	= $("#toggle_menu_btn"); // menu btn

// 	// toggle menu arrow
// 	var dropDownicon	= 	"southicon-arrow-top";
// 	var dropUpicon		= 	"southicon-arrow-down";
// 	var arrowClass		=	dropDownicon+" dropdwn-btn";

// 	function hidesub_menu(){
// 		$('#mobile-nav ul li').each(function() {
// 			$(this).children( "ul" ).show().addClass("active-submenu");
// 			$(this).children( "span" ).addClass(dropUpicon).removeClass(dropDownicon);
// 		});
// 	}

// 	menu_btn.click(function(e){
// 		$(this).toggleClass("active");
// 		hidesub_menu();
// 		e.stopImmediatePropagation();
// 		menubox.slideToggle();
// 		menubox.toggleClass('opened');
// 	});

// 	menubox.click(function(e){
// 		e.stopImmediatePropagation();
// 	});


// 	//click inner links

// 	$( "#mobile-nav ul li" ).each(function() {
// 		$(this).has( "ul" ).addClass( "menu-parent" ).append("<span class='dropdwn-btn'></span>" );
// 		var sub_menu	=	$(this).children( "ul" );
// 		$(this).children( 'span' ).click(function(event){
// 			var current_submenu	=	$(this).parent().children( "ul" );
// 			var sub_menu		=	$( ".menu-parent ul" );
// 			$(".dropdwn-btn").addClass(dropDownicon).removeClass(dropUpicon);

// 			if( current_submenu.hasClass("active-submenu") ){
// 				$(this).removeClass(dropUpicon).addClass(dropDownicon);
// 				sub_menu.slideUp();
// 				sub_menu.removeClass("active-submenu");
// 			} else {
// 				$(this).removeClass(dropDownicon).addClass(dropUpicon);
// 				sub_menu.removeClass("active-submenu");
// 				$(this).parent().children( "ul" ).addClass("active-submenu");
// 				sub_menu.slideUp();
// 				current_submenu.slideDown();
// 			}
// 		});

// 	});
// }

function _gallerySlider(){
	$('.gallery-slider').slick({
	  dots: false,
	  infinite: false,
	  arrows:true,
	  speed: 300,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  responsive: [
	  	{
		  breakpoint: 1180,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true,
			arrows:false,
		  }
		},
		{
		  breakpoint: 980,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2,
			infinite: true,
			dots: true,
			arrows:false,
		  }
		},
		{
		  breakpoint: 580,
		  settings: {
			slidesToShow: 1,
			slidesToScroll:1,
			dots: true,
			arrows:false,
		  }
		}
	  ]
	});
}

function _featuresFilter(){
	$('#features').mixItUp({
        callbacks: {
            onMixEnd: function(state){
              equalheight('#features li');
            }
        }
    });
}

function _faqsAccordion(){
	$( ".accordion" ).accordion({
		heightStyle: "content",
        collapsible: true,
        active: false
	});
}

$(window).resize(function(){
	if( $(window).innerWidth() > 767 ){
		$("#mobile-menu").removeAttr("style");
		$("#mobile-nav > ul > li > ul").removeAttr("style");
		$('#toggle_menu_btn').removeClass('active');
        $('#faqs-wrap .categories, #faqs-wrap .main-right').stick_in_parent({
            offset_top: 20
        });
	}
});




// AUTO LOAD ////////////////////////////
// Set up isOnScreen

$.fn.isOnScreen = function(x, y){
	if(y == null || typeof y == 'undefined') y = 1;
	var win = $(window);
	var viewport = {
		top : win.scrollTop()
	};
	viewport.bottom = viewport.top + win.height();
	var height = this.outerHeight();
	if(!height){
		return false;
	}
	var bounds = this.offset();
	bounds.bottom = bounds.top + height;
	var visible = (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	if(!visible){
		return false;
	}
	var deltas = {
		top : Math.min( 1, ( bounds.bottom - viewport.top ) / height),
		bottom : Math.min(1, ( viewport.bottom - bounds.top ) / height),
	};
	return (deltas.top * deltas.bottom) >= y;
};

// trigger a button click
$aCount = 0;
$('.loading').hide(); // hide loader animation
$(document).on('scroll ready', function(){
	if($('.load-more a').isOnScreen() === true){
		if($aCount == 0){
			$('.load-more a').trigger('click');
		}
		$aCount += 1;
	}
});

// $('.load-more a').on('click', function(e)  {
// 	$('.loading').show(); // show loader animation
// 	e.preventDefault();
//    // $('.text_holder').append("<div class=\"loader\">&nbsp;</div>");
// 	$(this).parent().addClass('loading');
// 	var link = jQuery(this).attr('href');

// 	var $content = '.scroll-content';
// 	var $nav_wrap = '.load-more';
// 	var $anchor = '.load-more a';
// 	var $next_href = $($anchor).attr('href'); // Get URL for the next set of posts

// 	$.get(link+'', function(data){
// 		var $timestamp = new Date().getTime();
// 		var $new_content = $($content, data).wrapInner('').html(); // Grab just the content
// 		$next_href = $($anchor, data).attr('href'); // Get the new href
// 		$('.scroll-content .post-content:last-child').after($new_content); // Append the new content
// 		$('.load-more a').attr('href', $next_href); // Change the next URL
// 		var nlink = $('.load-more a').attr('href');
// 		if(nlink == link){ $('.load-more a').remove(); }

// 	}).done(function(data){
// 		$aCount = 0;
// 		$('.loading').hide(); //hide loader animation
// 	});
// });

    // Set up isOnScreen

    $.fn.isOnScreen = function(x, y){
        if(y == null || typeof y == 'undefined') y = 1;
        var win = $(window);
        var viewport = {
            top : win.scrollTop()
        };
        viewport.bottom = viewport.top + win.height();
        var height = this.outerHeight();
        if(!height){
            return false;
        }
        var bounds = this.offset();
        bounds.bottom = bounds.top + height;
        var visible = (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom));
        if(!visible){
            return false;
        }
        var deltas = {
            top : Math.min( 1, ( bounds.bottom - viewport.top ) / height),
            bottom : Math.min(1, ( viewport.bottom - bounds.top ) / height),
        };
        return (deltas.top * deltas.bottom) >= y;
    };

    // trigger a button click
    $aCount = 0;
    $('.loader').hide(); // hide loader animation
    $(document).on('scroll ready', function(){
        if($('.load-more a').isOnScreen() === true){
            if($aCount == 0){
                $('.load-more a').trigger('click');
            }
            $aCount += 1;
        }
    });

    // $('.load-more a').on('click', function(e)  {
    //     $('.loader').show(); // show loader animation
    //     e.preventDefault();
    //    // $('.text_holder').append("<div class=\"loader\">&nbsp;</div>");
    //     $(this).parent().addClass('loading');
    //     var link = jQuery(this).attr('href');

    //     var $content = '.scroll-content';
    //     var $nav_wrap = '.load-more';
    //     var $anchor = '.load-more a';
    //     var $next_href = $($anchor).attr('href'); // Get URL for the next set of posts

    //     $.get(link+'', function(data){
    //         var $timestamp = new Date().getTime();
    //         var $new_content = $($content, data).wrapInner('').html(); // Grab just the content
    //         $next_href = $($anchor, data).attr('href'); // Get the new href
    //         $('.scroll-content .post-content:last-child').after($new_content); // Append the new content
    //         $('.load-more a').attr('href', $next_href); // Change the next URL
    //         var nlink = $('.load-more a').attr('href');
    //         if(nlink == link){ $('.load-more a').remove(); }

    //     }).done(function(data){
    //         $aCount = 0;
    //         $('.loader').hide(); //hide loader animation
    //     });
    // });


$('.bio-more').on('click', function(){
    $(this).next('.bio-detail').slideToggle(200);
    $(this).hide();
    return false;
})



$('#event-filter select').on('change', function () {
  var url = $(this).val(); // get selected value
  if (url) { // require a URL
      window.location = url; // redirect
  }
  return false;
});


$('.video-link').magnificPopup({type: 'iframe'});
$('.vr-link').magnificPopup({type: 'iframe'});

$('.gallery-slider').each(function(){
    $(this).magnificPopup({
        type: 'image',
        delegate: '.image-link',
        gallery:{
            enabled: true,
            arrowMarkup: '<span class="popup-nav"><button type="button" class="mfp-prevent-close gallery-arrow-%title% %title%"></button></span>', // markup of an arrow button
            tPrev: 'left', // title for left button
            tNext: 'right', // title for right button
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
        }
    });
})

$('#toggle_menu_btn').click(function(){
    $(this).toggleClass('active');
    $('#mobile-menu').toggleClass('open');
});

$('#mobile-menu .menu-item-has-children').click(function(){
   $(this).toggleClass('open');
   $(this).children('ul').slideToggle(200);
});



$('.feature-filter-mobile .select-wrap select').on('change', function(){
    var filter = $(this).val();
    $('.feature-filter-desktop li[data-filter=".' + filter + '"]').trigger('click');
});






equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

// SEE MIX IT UP PLUGIN CALL ABOVE FOR WINDOW LOAD INIT
// $(window).load(function() {
//   equalheight('.main article');
// });

$(window).resize(function(){
  equalheight('#features li');
});


    $('.categories a').click(function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 500);
        return false;
    });

    $('.locations-state').click(function(){
        $(this).next('.locations').addClass('active');
        $(this).parent().parent().addClass('hide');
        return false;
    })
    $('.locations h6 a').click(function(){
        $(this).parent().parent().removeClass('active');
        $(this).parent().parent().parent().parent().removeClass('hide');
        return false;
    })


        $('.featured-slideshow').slick({
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: true,
            infinite: true,
            fade: false,
            speed: 500,
            swipe: true,
            draggable: true,
            dots: true,
            arrows: false
        });

