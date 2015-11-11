/**
 * Created by joel on 31/10/2015.
 */

// Wiggle Function

jQuery(document).ready(function ($) {

    // Handle smoothWheel
    enableScroll();

    // Handle smooth-scroll
    $('nav .cd-primary-nav a').smoothScroll({
        afterScroll: function () {
            menuSlide();
        },
        easing: "swing"


    })

    // Handle responsive cardSlider

    if($(window).width() < 600){
        $('.cardslider').height(($('.cs-current .cs-desc-title').outerHeight() + $('.cs-current .cs-desc-content').outerHeight() + 200));
    }

    $(window).resize(function(){
        if($(window).width() < 600){
            $('.cardslider').height(($('.cs-current .cs-desc-title').outerHeight() + $('.cs-current .cs-desc-content').outerHeight() + 200));
        }else{
            $('.cardslider').height("inherit");
        }
    });

    // Instantiate wiggle on .wiggle
    wiggle(".wiggle");

    // Bind click event
    $('body').on('click', '.showImage', function () {
        showImage(this);
    });

    $('body').on('click', '.openVideo', function () {
        showVideo(this);
    });

    $('body').on('click', '.overlayExit', function () {
        hideOverlay();
    });

    //Vertical Parallax

    $('[data-type="background"]').each(function () {
        var $bgobj = $(this); // assigning the object

        $(window).scroll(function () {
            var yPos = parseInt(($bgobj.parent().offset().top - $(window).scrollTop()) / $bgobj.data('speed'));
            // Put together our final background position
            var coords = -yPos;

            // Move the background
            $bgobj.css("top", coords);
        });
    });

});

function wiggle(selector) {
    jQuery(selector).each(function () {
        wiggleProp(this, 'scale', 0.85, 1);
        wiggleProp(this, 'rotation', -5, 5);
        wiggleProp(this, 'x', -10, 10);
        wiggleProp(this, 'y', -10, 10);
    });
}

function wiggleProp(element, prop, min, max) {
    var duration = Math.random() * 2 + 1;

    var tweenProps = {
        ease: Power1.easeInOut,
        onComplete: wiggleProp,
        onCompleteParams: [element, prop, min, max]
    };
    tweenProps[prop] = Math.random() * (max - min) + min;

    TweenMax.to(element, duration, tweenProps);
}

function showImage($image) {

    disableScroll();

    $href = jQuery($image).data('href');

    jQuery('.overlay').addClass('visible').removeClass('hidden');

    jQuery('.overlayContent > .content').addClass('grow-off').html('<img src="' + $href + '" alt="popup image"/>');

}

function showVideo($image) {

    disableScroll();

    $href = jQuery($image).data('href');

    jQuery('.overlay').addClass('visible').removeClass('hidden');

    jQuery('.overlayContent > .content').removeClass('grow-off').html('<div class="embed-container"><iframe src="' + $href + '" frameborder="0" allowfullscreen></iframe></div>');

}


function hideOverlay() {

    enableScroll();

    jQuery('.overlay').removeClass('visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
        jQuery(this).addClass('hidden');
    });

    jQuery('.overlayContent > .content').empty();

}

function disableScroll() {
    jQuery(document).smoothWheel({remove: "true"});
}

function enableScroll() {
    jQuery(document).smoothWheel();
}

