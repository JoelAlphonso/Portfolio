/**
 * Created by joel on 31/10/2015.
 */

// Wiggle Function

jQuery(document).ready(function($){

    // Instantiate wiggle on .wiggle
    wiggle(".wiggle");

    //Vertical Parallax

    $('[data-type="background"]').each(function(){
        var $bgobj = $(this); // assigning the object

        $(window).scroll(function() {
            var yPos = parseInt(($bgobj.parent().offset().top - $(window).scrollTop()) / $bgobj.data('speed'));
            // Put together our final background position
            var coords = -yPos ;

            // Move the background
            $bgobj.css("top",coords);
        });
    });

});

function wiggle(selector){
    jQuery(selector).each(function() {
        wiggleProp(this, 'scale', 0.85, 1);
        wiggleProp(this, 'rotation', -5, 5);
        wiggleProp(this, 'x', -10, 10);
        wiggleProp(this, 'y', -10, 10);
    })
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

