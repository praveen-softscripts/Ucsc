jQuery(window).load(function(){
     jQuery('.homeslider').slick({
        arrows: true,
         dots:false,
         autoplay: true,
        autoplaySpeed: 2000
      });
    jQuery('.team-slider').slick({
        arrows: true,
         dots:true
      });
// First tab slider
	jQuery('.show-slider1').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: true,
	  fade: true,
      adaptiveHeight: true,  
	  asNavFor: '.thumbs-slider1'
	});
	jQuery('.thumbs-slider1').slick({
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  asNavFor: '.show-slider1',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});
    
// Second tab slider
    jQuery('.show-slider2').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: true,
	  fade: true,
      adaptiveHeight: true,  
	  asNavFor: '.thumbs-slider2'
	});
	jQuery('.thumbs-slider2').slick({
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  asNavFor: '.show-slider2',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});

 // Third tab slider   
    jQuery('.show-slider3').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: true,
	  fade: true,
      adaptiveHeight: true,  
	  asNavFor: '.thumbs-slider3'
	});
	jQuery('.thumbs-slider3').slick({
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  asNavFor: '.show-slider3',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});
    jQuery('.fancybox').fancybox();
    matchheight();
	jQuery('.tabs-section ul.tabs').each(function(){

		  var $active, $content, $links = jQuery(this).find('a');


		  $active = jQuery($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
		  $active.addClass('active');

		  $content = jQuery($active[0].hash);

		  $links.not($active).each(function () {
			jQuery(this.hash).hide();
		  });

		  jQuery(this).on('click', 'a', function(e){

				$active.removeClass('active');
				$content.hide();

				$active = jQuery(this);
				$content = jQuery(this.hash);


				$active.addClass('active');
				$content.show();

				e.preventDefault();
			  });
		});
});

jQuery(document).ready(function(){
//    jQuery('.download-link').click(function(){
//            var file= "<?php echo get_field('download_file',$post->ID); ?>";
//            window.open(Theme.ajax_url + "?action=force_download&file=" + file );
//            return false;
//    });
        jQuery('li.no-link > a').click(function(){
            if(jQuery(this).parent().hasClass('active')){
               jQuery(this).parent().removeClass('active');
                jQuery(this).parent().find('.mega-menu-block').hide(); 
            }
            else{
                jQuery(this).parent().addClass('active');
                jQuery(this).parent().find('.mega-menu-block').show();
            }

            return false;
        });
    jQuery('.header-nav .mega-menu-block li').hover(function(){
        jQuery('.mega-menu-block').addClass('active');
        jQuery('.header-nav .mega-menu-block .main-sub-menu > li').addClass('inactive');
        jQuery(this).removeClass('inactive');
        jQuery(this).addClass('active');
    },function(){
        jQuery('.mega-menu-block').removeClass('active');   
        jQuery('.header-nav .mega-menu-block .main-sub-menu > li ').removeClass('inactive');
        jQuery(this).removeClass('active');
    });
    //add arrow to sub menu
    jQuery('.header-nav > ul > li:has(.mega-menu-block) > a').addClass('arrowmark');
    
    //scroll top js
    jQuery("a.to_top").click(function(){
 		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = jQuery(this.hash);
	      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		  //console.log(target);
	      if (target.length) {
			  
	        jQuery('html,body').animate({ scrollTop: target.offset().top - 75 }, 1000);			
			return false;
	      }
	    }
	}); 
    jQuery("a.to_top-scroll").click(function(){
 		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = jQuery(this.hash);
	      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		  //console.log(target);
	      if (target.length) {
			  
	        jQuery('html,body').animate({ scrollTop: target.offset().top - 75 }, 1000);			
			return false;
	      }
	    }
	}); 
    
	jQuery("span.see_more").click(function(){
		jQuery(this).parents('.about-content').toggleClass('active');
		return false;
	});
	jQuery(".qimage img").click(function(){
		jQuery('.qunie-content').toggleClass('active');
		return false;
	});
	jQuery("span.qmore").click(function(){
		jQuery('.qunie-content').toggleClass('active');
		return false;
	});
    matchheight();
    //sub menu for mobile navigation	
	jQuery('.mobile-nav  ul > li:has(ul) > a').append('<span class="menu-arrow"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> </span>');	
    jQuery('.mobicon').click(function(){
			jQuery('.mobile-nav').toggleClass('active');
			jQuery('.wrapper').toggleClass('active');
			jQuery(this).toggleClass('active');
	});	
    //show sub menu in mobile
		jQuery('.mobile-nav ul li a span.menu-arrow').click(function(){
				jQuery(this).toggleClass('active');
                jQuery(this).parent().parent().find('> .sub-menu').slideToggle();
				return false;
		});
});

function matchheight(){
	jQuery(".match").matchHeight(true);
}
    
/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );
	
