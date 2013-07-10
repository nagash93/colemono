
/*loading image*/

jQuery(document).ready(function(){	

	jQuery('.overgallery').hide();
	jQuery('.overvideo').hide();
	jQuery('.overdefult').hide();	  
	jQuery('.overport').hide();	  

	
	
	
	jQuery(window).load(function () {
		jQuery('.one_half').find('.loading').attr('class', '');
		jQuery('.one_third').find('.loading').attr('class', '');	
		jQuery('.one_fourth').find('.loading').attr('class', '');			
		jQuery('.item').find('.loading').attr('class', '');
		jQuery('.item4').find('.loading').attr('class', '');
		jQuery('.item3').find('.loading').attr('class', '');	
		jQuery('.blogimage').find('.loading').attr('class', '');	
		jQuery('.image').css('background', 'none');
		jQuery('.recentimage').css('background', 'none');	
		jQuery('.audioPlayerWrap').css({'background':'none','height':'25px','padding-top':'0px'});	
		jQuery('.blogpostcategory').find('.loading').removeClass('loading');
		jQuery('.image').find('.loading').removeClass('loading');
		//show the loaded image
		jQuery('iframe').show()	
		jQuery('img').show();
		jQuery('.audioPlayer').show();
		jQuery('.overgallery').show();
		jQuery('.overvideo').show();
		jQuery('.overdefult').show();	  
		jQuery('.overport').show();	  
		jQuery('#slider-wrapper .loading').removeClass('loading');
		jQuery('.imagesSPAll .loading').removeClass('loading');
		jQuery('#slider').css('display','block');
		jQuery('#slider .images').animate({'opacity':1},300);
		jQuery('#slider,#slider img,.textSlide').css('opacity','1'); 
		jQuery('#slider-wrapper').css('max-height','500px'); 		
    })



});




function gotosite(sel) {
		var URL = sel.options[sel.selectedIndex].value; 
		
		window.location.href = URL;

}

/*add submenu class*/	
jQuery(document).ready(function(){

   jQuery('#menu-main-menu-1 > li').each(function(index) {
	   if(jQuery(this).find('ul').size() > 0 ){
			jQuery(this).addClass('has-sub-menu');
	   }
	});

});

/*animate menu*/

jQuery(document).ready(function(){
	jQuery('ul.menu > li').hover(function(){
		jQuery(this).find('ul').stop(true,true).fadeIn(300);

	},
	  function () {
		jQuery(this).find('ul').stop(true,true).fadeOut(300);
	  });
	
});

/*add lightbox*/
jQuery(document).ready(function(){
jQuery(".gallery a").attr("rel", "lightbox[gallery]");

});


/*form hide replay*/
jQuery(document).ready(function(){
	jQuery(".reply").click(function(){
		jQuery('#commentform h3').hide();
	});
	jQuery("#cancel-comment-reply-link").click(function(){
		jQuery('#commentform h3').show();
	});	


});



/*to top*/

jQuery(document).ready(function($){
	$(".totop ").hide();

});

jQuery(window).bind('scroll', function(){
if(jQuery(this).scrollTop() > 200) 
 jQuery(".totop ").fadeIn(200);
else
 jQuery(".totop ").fadeOut(200);
 


});

/*browserfix*/

jQuery(document).ready(function(){
if(jQuery.browser.opera){
	jQuery('#headerwrap').css('top','0');
	jQuery('#wpadminbar').css('display','none');	


}
if (jQuery.browser.msie && jQuery.browser.version.substr(0,1)<9) {
	jQuery('.cartTopDetails').css('border','1px solid #eee');
	jQuery('#headerwrap').css('border-bottom','1px solid #ddd');	

}	
	

});

/* shortcode*/
jQuery(document).ready(function(){

	if(jQuery('.accordion').length>0){
		jQuery(function() {
			jQuery( ".accordion" ).accordion({
				autoHeight: false,
				navigation: true
			});
		});
	}

	if(jQuery('.progressbar').length>0){
		jQuery(function() {
			jQuery( ".progressbar" ).progressbar();
		});
	}

});

/* lightbox*/
function loadprety(){

jQuery(".gallery a").attr("rel", "lightbox[gallery]").prettyPhoto({theme:'light_rounded',overlay_gallery: false,show_title: false});

}
				
	
jQuery(document).ready(function() {	

	jQuery(".toggle_container").hide(); 

	jQuery("h2.trigger").click(function(){
		jQuery(this).toggleClass("active").next().slideToggle("slow");
	});
});	

jQuery(document).ready(function(){	
	jQuery(function() {
	jQuery(".tabwrap").tabs();
	});
	
	
});



jQuery(document).ready(function(){	
	jQuery('.gototop').click(function() {
		jQuery('html, body').animate({scrollTop:0}, 'medium');
	});
});


/*search*/
jQuery(document).ready(function(){	
	if(jQuery('.widget_search').length>0){
		jQuery('#sidebarsearch input').val('Search...');
		
		jQuery('#sidebarsearch input').focus(function() {
			jQuery('#sidebarsearch input').val('');
		});
		
		jQuery('#sidebarsearch input').focusout(function() {
			jQuery('#sidebarsearch input').val('Search...');
		});	
	}
});



jQuery(function(){
    jQuery("ul#ticker01").liScroll();
});

jQuery(document).ready(function(){	
	jQuery('.add_to_cart_button.product_type_simple').live('click', function() {
		jQuery(this).parents(".product").children(".process").children(".loading").css("display", "block");
		jQuery(this).parents(".product").children(".thumb").children("img").css("opacity", "0.1");


	
		
		
		
	});
	
	jQuery('body').bind('added_to_cart', function() {

		jQuery(".product .loading").css("display", "none");
		
		//$(".product .added").parents(".product").children(".process").children(".added-btn").css("display", "block").delay(500).fadeOut('slow');
		
		jQuery(".product .added").parents(".product").children(".thumb").children("img").delay(600).animate( { "opacity": "1" });

		return false;
	});
});
	
jQuery(document).ready(function($) {

	// Ajax add to cart
	$('.add_to_cart_button').live('click', function() {
		
		// AJAX add to cart request
		var $thisbutton = $(this);
		
		if ($thisbutton.is('.product_type_simple, .product_type_downloadable, .product_type_virtual')) {
			
			if (!$thisbutton.attr('data-product_id')) return true;
			
			$thisbutton.removeClass('added');
			$thisbutton.addClass('loading');
			
			var data = {
				action: 		'woocommerce_add_to_cart',
				product_id: 	$thisbutton.attr('data-product_id'),
				security: 		woocommerce_params.add_to_cart_nonce
			};
			
			// Trigger event
			$('body').trigger('adding_to_cart');
			
			// Ajax action
			$.post( woocommerce_params.ajax_url, data, function(response) {
				
				var this_page = window.location.toString();
				
				this_page = this_page.replace( 'add-to-cart', 'added-to-cart' );
				
				$thisbutton.removeClass('loading');

				// Get response
				data = $.parseJSON( response );
				
				if (data.error && data.product_url) {
					window.location = data.product_url;
					return;
				}
				
				fragments = data;

				// Block fragments class
				if (fragments) {
					$.each(fragments, function(key, value) {
						$(key).addClass('updating');
					});
				}
				
				// Block widgets and fragments
				$('.widget_shopping_cart,.widget_shopping_cart_top, .updating, .cart_totals').fadeTo('400', '0.6').block({message: null, overlayCSS: {background: 'transparent url(' + woocommerce_params.ajax_loader_url + ') no-repeat center', opacity: 0.6 } } );
				
				// Changes button classes
				$thisbutton.addClass('added');

				// Cart widget load
				if ($('.widget_shopping_cart').size()>0) {
					$('.widget_shopping_cart:eq(0)').load( this_page + ' .widget_shopping_cart:eq(0) > *', function() {

						// Replace fragments
						if (fragments) {
							$.each(fragments, function(key, value) {
								$(key).replaceWith(value);
							});
						}
						
						// Unblock
						$('.widget_shopping_cart, .updating').stop(true).css('opacity', '1').unblock();
						
						$('body').trigger('cart_widget_refreshed');
					} );
				} else {
					// Replace fragments
					if (fragments) {
						$.each(fragments, function(key, value) {
							$(key).replaceWith(value);
						});
					}
					$('.widget_shopping_cart, .updating').stop(true).css('opacity', '1').unblock();
				}

				// Cart widget load
				if ($('.widget_shopping_cart_top').size()>0) {
					$('.widget_shopping_cart_top:eq(0)').load( this_page + ' .widget_shopping_cart_top:eq(0) > *', function() {

						// Replace fragments
						if (fragments) {
							$.each(fragments, function(key, value) {
								$(key).replaceWith(value);
							});
						}
						
						// Unblock
						$('.widget_shopping_cart_top, .updating').stop(true).css('opacity', '1').unblock();
						
						$('body').trigger('cart_widget_refreshed');
					} );
				} else {
					// Replace fragments
					if (fragments) {
						$.each(fragments, function(key, value) {
							$(key).replaceWith(value);
						});
					}
					
					// Unblock
					$('.widget_shopping_cart_top, .updating').stop(true).css('opacity', '1').unblock();
				}
				
				// Cart page elements
				$('.widget_shopping_cart').load( this_page + ' .widget_shopping_cart:eq(0) > *', function() {
					
					$("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass('buttons_added').append('<input type="button" value="+" id="add1" class="plus" />').prepend('<input type="button" value="-" id="minus1" class="minus" />');
					
					$('.widget_shopping_cart').stop(true).css('opacity', '1').unblock();
					
					$('body').trigger('cart_page_refreshed');
				});
				
				$('.cart_totals').load( this_page + ' .cart_totals:eq(0) > *', function() {
					$('.cart_totals').stop(true).css('opacity', '1').unblock();
				});

				// Cart page elements
				$('.widget_shopping_cart_top').load( this_page + ' .widget_shopping_cart_top:eq(0) > *', function() {
					
					$("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass('buttons_added').append('<input type="button" value="+" id="add1" class="plus" />').prepend('<input type="button" value="-" id="minus1" class="minus" />');
					
					$('.widget_shopping_cart_top').stop(true).css('opacity', '1').unblock();
					
					$('body').trigger('cart_page_refreshed');
				});
				
				$('.cart_totals.top').load( this_page + ' .cart_totals.top:eq(0) > *', function() {
					$('.cart_totals.top').stop(true).css('opacity', '1').unblock();
				});						
				
				// Trigger event so themes can refresh other areas
				$('body').trigger('added_to_cart');
		
			});
			
			return false;
		
		} else {
			return true;
		}
		
	});

});