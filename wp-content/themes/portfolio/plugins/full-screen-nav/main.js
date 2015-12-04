jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MQL = 0;

    // Display extended menu after hero
    $(window).on('scroll', function(){
        if($(window).scrollTop() > $('div#fullpage > section:nth-child(1)').height()){
            if(!$("header").hasClass('extended')){
                $("header").addClass('extended');
            }
        }else{
           if($("header").hasClass('extended')){
               $("header").removeClass('extended');
           }
       }
    });

	//primary navigation slide-in effect
	if($(window).width() > MQL) {
		var headerHeight = $('.cd-header').height();
		$(window).on('scroll',
		{
	        previousTop: 0
	    }, 
	    function () {
		    var currentTop = $(window).scrollTop();
		    //check if user is scrolling up
		    if (currentTop < this.previousTop ) {
		    	//if scrolling up...
		    	if (currentTop > 0 && $('.cd-header').hasClass('is-fixed')) {
		    		$('.cd-header').addClass('is-visible');
		    	} else {
		    		$('.cd-header').removeClass('is-visible is-fixed');
		    	}
		    } else {
		    	//if scrolling down...
		    	$('.cd-header').removeClass('is-visible');
		    	if( currentTop > headerHeight && !$('.cd-header').hasClass('is-fixed')) $('.cd-header').addClass('is-fixed');
		    }
		    this.previousTop = currentTop;
		});
	}

	//open/close primary navigation
	$('.cd-primary-nav-trigger').on('click', function(){
		menuSlide();
    });

});

function menuSlide(){
    jQuery('.cd-menu-icon').toggleClass('is-clicked');
    jQuery('.cd-header').toggleClass('menu-is-open');

    //in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
    if( jQuery('.cd-primary-nav').hasClass('is-visible') ) {

        jQuery('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
            //$('body').removeClass('overflow-hidden');
            enableScroll();
        });
    } else {
        jQuery('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
            //$('body').addClass('overflow-hidden');
            disableScroll();
        });

    }
}