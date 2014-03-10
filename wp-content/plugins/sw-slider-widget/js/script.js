
	jQuery(window).load(function() {
		jQuery('.yaslider').each(function(){
			var height = jQuery("#"+this.id).height();
			jQuery("#"+this.id + ' .carousel-control').css('top', height/2);
		});
	});
	jQuery(window).resize(function() {
		jQuery('.yaslider').each(function(){
			var height = jQuery("#"+this.id).height();
			jQuery("#"+this.id + ' .carousel-control').css('top', height/2);
		});
	});
	