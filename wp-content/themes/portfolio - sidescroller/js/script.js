/**
 * Created by joel on 31/10/2015.
 */

(function($)
{

$(document).ready(function ($) {

    // Handle smoothWheel
    enableScroll();

    // Side Scroller initialisation
    sideScrollerInit();

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
    $(selector).each(function () {
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

    $href = $($image).data('href');

    $('.overlay').addClass('visible').removeClass('hidden');

    $('.overlayContent').addClass('grow-off');

    $('.overlayContent > .content').html('<img src="' + $href + '" alt="popup image"/>');

}

function showVideo($image) {

    disableScroll();

    $href = $($image).data('href');

    $('.overlay').addClass('visible').removeClass('hidden');

    $('.overlayContent').removeClass('grow-off')

    $('.overlayContent > .content').html('<div class="embed-container"><iframe src="' + $href + '" frameborder="0" allowfullscreen></iframe></div>');

}


function hideOverlay() {

    enableScroll();

    $('.overlay').removeClass('visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
        $(this).addClass('hidden');
    });

    $('.overlayContent > .content').empty();

}

function disableScroll() {
    $(document).smoothWheel({remove: "true"});
    $('body').addClass('overflowhidden');
}

function enableScroll() {
    $(document).smoothWheel();
    $('body').addClass('overflowhidden');
}

// Side Scroller Script

function sideScrollerInit(){

    // SideScroller Object
    sideScroller = {
        speed: 10,
        velocity: 0
    },
    layers = [],
    keys = [],
    friction = 0.95;

    // Get all layers in the table
    $(".paraLayer").each(function(index) {
        
        var currentLayer = $(this);
        var layerPos = currentLayer.position().left;
        var layerSpeed = currentLayer.data('depth');

        layers[index] = {
            layer: currentLayer,
            position: layerPos,
            speed: layerSpeed
        };
    });

    $(document).keydown(function(event) {
        // Listen to key down and store data in keys
        keys[event.keyCode] = true;
    });

    $(document).keyup(function(event) {
        // Listen to key down and store data in keys
        keys[event.keyCode] = false;
    });

    setInterval(updateFrame, 1000 / 60);

}

function updateFrame(){
    
    if(keys[39]){ 
        // Right Arrow
        if(sideScroller.velocity > -sideScroller.speed){
            sideScroller.velocity--;
        }
    }
    if(keys[37]){
        // Left Arrow
        if(sideScroller.velocity < sideScroller.speed){
            sideScroller.velocity++;
        }
    }

    // Apply resistance
    sideScroller.velocity *= friction;

    // Apply movement to each layers
    $.each(layers, function(index, layer){
        
        //console.log(sideScroller.velocity);
        // Update object data
        layer.position += (sideScroller.velocity * layer.speed);

        // The new position in pixels
        var xPos = layer.position + "px";

        // Apply transformation
        layer.layer.css("transform", "translateX("+ xPos +")");

    });
}

})(jQuery);
