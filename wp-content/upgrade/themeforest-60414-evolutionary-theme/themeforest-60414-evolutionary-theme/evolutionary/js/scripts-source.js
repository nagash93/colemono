jQuery(document).ready(function($) {

	var speed = parseInt( scsettings.speed );
	var dontpause = scsettings.dontpause;
	if (speed <= 0) { speed = 5000; }
		
	// we have JavaScript enabled...
	$('body').removeClass('nojs');
	
	$afeatured = $('#featured a.readfeatured');
	
	$('li.widget:not(.widget_twitter, #twitter-tools) ul:not(.widgetnav) li a').hover(
            function() { $(this).stop().animate({paddingLeft:"12px"}, {queue:false,duration:200}); },
            function() { $(this).stop().animate({paddingLeft:"2px"}, {queue:false,duration:200}); } 
	);
		
	$('#header li a').hover(
            function() { $(this).children('span').animate({bottom:"15px"}, {queue:false,duration:200}); },
            function() { $(this).children('span').animate({bottom:"5px"}, {queue:false,duration:200}); } 
	);
	
	$afeatured.hover(
            function() { $(this).animate({height:"41px"}, {queue:false,duration:200}); },        					
            function() { $(this).animate({height:"36px"}, { queue:false,duration:200}); }
    );

	if($.browser.msie && $.browser.version<="6.0") 
	{ 
		$afeatured.trigger('mouseover').trigger('mouseout');
	}

	// featured posts
	var $feat = $('#featured'),
		$featimg = $('#featuredimages'),
		$featexc = $('#featuredexcerpts'),
		$fimgli = $featimg.children('li'),
		$fexcli = $featexc.children('li'),
		totalfeats = $fimgli.length,
		featnav = '';
	
	if (totalfeats > 1)
	{
		for (var i = 0; i < totalfeats; i++)
		{
			featnav = featnav + '<li><a href="#excerpt' + i + '"></a></li>';	
		}
		
		featnav = '<ul id="featurednav">' + featnav + '</ul>';
		
		$feat.prepend(featnav);
		
		var $fnav = $('#featurednav'),
			$fnavlist = $fnav.children('li'),
			$fnavlink = $fnavlist.children('a');
			
	    $fnavlink.eq(0).addClass('active');
		
	   	$fnavlist.localScroll({
	            target: $('#featuredexcerpts'),
	            axis:'xy',
	            queue:true,
	            duration:1200,
	            hash:false
	    });
	
	    $fnavlink.click(function() {
	
	    	clearTimeout(t);
	
	        var idx = $fnavlink.index(this),
	        	$target = $featimg.children('li:eq(' + idx + ')');
			
			$fnavlink.removeClass('active');
			$(this).addClass('active');
			
			if($.browser.msie && $.browser.version<="6.0") 
			{ 
				$fnavlink.css('backgroundPosition', '0 0')
				$(this).css('backgroundPosition', '0 -21px'); 
			}
			
	        $featimg.stop().scrollTo( $target , 800 );
	
			if (!$fnav.hasClass('paused')) { t = setTimeout(scrollit, speed); }
	
	    });
	    
		var t = setTimeout(scrollit, speed);
		
		if (dontpause === "false")
		{
		    $feat.children().hover(
		    	function() {
		    		$fnav.addClass('paused');
		    		clearTimeout(t); 
		    	}, 
		    	function() { 
		    		$fnav.removeClass('paused');
		    		t = setTimeout(scrollit, speed); 
		    	});
	    }
	}

	function scrollit()
	{
		var $fnavlink = $('#featurednav li a'),
			idx = $fnavlink.index($('.active'));
			
			if (idx === ($fnavlink.length - 1))			
			{
				idx = 0;
			}
			else
			{
				idx = idx + 1;
			}
			
			$fnavlink.eq(idx).trigger('click');			
	}
	
	/* who's talking widget */
	$widget_comments = $('ul#widget_comments');
	$widget_popular = $('ul#widget_popular');
	
	if($widget_comments.length > 0 && $widget_popular.length > 0)
	{
		$widget_nav = $('ul.widgetnav');
		$widget_nav_li = $widget_nav.children('li');
		$widget_comments_a = $widget_nav_li.find('a[href=#widget_comments]');
		$widget_popular_a = $widget_nav_li.find('a[href=#widget_popular]');
		
		if ($widget_comments_a.parent().hasClass('current'))
		{
			$widget_popular.hide();
			$widget_comments.show();
		}
		else
		{
			$widget_comments.hide();
			$widget_popular.show();		
		}
		
		$widget_comments_a.click(function() {
			$widget_popular.slideUp();
			$widget_comments.slideDown();
			$widget_nav_li.removeClass('current');
			$(this).parent().addClass('current');
			return false;
		});
		
		$widget_popular_a.click(function() {
			$widget_comments.slideUp();
			$widget_popular.slideDown();
			$widget_nav_li.removeClass('current');
			$(this).parent().addClass('current');
			return false;
		});
	}
	
	/* external links */	
	$(".entry a[href*='http://']:not([href*='"+location.hostname+"'])").addClass('external');
	$("a.external, a[rel*=external]").attr("target","_blank");
	
	// search box
	var $search = $('#search input');
	$search.focus(function() {
		if ($(this).val() === $(this)[0].defaultValue) { $(this).val(''); }
	}).blur(function() {
		if ($(this).val() === '') { $(this).val($(this)[0].defaultValue); }
	}).click(function() { 
		$(this).trigger('focus'); 
	});
		
});







