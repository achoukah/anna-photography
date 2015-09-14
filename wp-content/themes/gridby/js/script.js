(function ($) {
	
	/* Slider */
	
	$('.carousel').carousel();
	
		/* Slider Touch Support */
		
		$(".carousel").swiperight(function() {
			 $(this).carousel('prev');
		});
		
		$(".carousel").swipeleft(function() {
			$(this).carousel('next');
		}); 
	
	
	/* Animate link to the top */
	
	$("a[href='#top']").click(function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});
	
	/* Activate gallery */
	
	$('.gallery').magnificPopup({
        gallery:{enabled:true},
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        // other options
    });	
    
    /* Isotope Mosaic */
		  
	var $container = $('.mos-container'),
		colWidth = function () {
		
			var w = $container.width(), 
				columnNum = 1,
				columnWidth = 0;
			
			/* break Point */	
			if (w > 680) {
				columnNum  = 3;
			} else if (w > 0) {
				columnNum  = 2;
			} 
	
			columnWidth = Math.floor(w/columnNum);
			$container.find('.mos-item').each(function() {
				var $item = $(this),
					
					multiplier_w = $item.attr('class').match(/item-w(\d)/),
					multiplier_h = $item.attr('class').match(/item-h(\d)/),
					
					multiplier_sm_w = $item.attr('class').match(/item-sm-w(\d)/),
					multiplier_sm_h = $item.attr('class').match(/item-sm-h(\d)/),
					
					/* width */
					width = multiplier_w ? columnWidth*multiplier_w[1]-20 : columnWidth-20, // leave -10 to have no margin and update style.css
					
					/* height */
					height = multiplier_h ? columnWidth*multiplier_h[1]-20 : columnWidth-20; // leave -10 to have no margin and update style.css

					/* width form mobile */
					widthMobile =  multiplier_sm_w ? columnWidth*multiplier_sm_w[1]-20 : columnWidth-20,	
					
					/* height for mobile */
					heightMobile = multiplier_sm_h ? columnWidth*multiplier_sm_h[1]-20 : columnWidth-20; 					
				
				/* break Point */	
				if (w > 680) {
					
					/* desktop */
					$item.css({
						width: width,
						height: height
					});
					
				} else if (w > 0) {
					
					/* mobile */
					$item.css({
						width: widthMobile,
						height: heightMobile
					});				
				}	
				
			});
			return columnWidth;
			
		},
		isotope = function () {
			$container.isotope({
				resizable: false,
				itemSelector: '.mos-item',
				masonry: {
					columnWidth: colWidth(),
					gutterWidth: 0
				}
			});
		};
		
	isotope();
	
	$(window).resize(isotope);

	$('.arrow-down').click(function(event){
	    event.preventDefault();
	    var n = $(document).height();
	    $('html, body').animate({scrollTop:$('#grid-anchor').position().top},1000);
	});
	
	
	$(window).scroll(function(e){
	  parallax();
	});
	function parallax(){
	  var scrolled = $(window).scrollTop();
	  $('.fill').css('top',+(scrolled*0.7)+'px');
	}
	
	
}(jQuery));
