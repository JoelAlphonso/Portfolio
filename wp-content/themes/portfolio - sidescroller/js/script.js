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

    // DayNight cycle
    dayNightCycle();

    $(window).resize(function(event) {
        /* Act on the event */
        updateSideScroller();
    });

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
        wiggleProp(this, 'scale', 1, 1);
        wiggleProp(this, 'rotation', 0, 0);
        wiggleProp(this, 'x', -10, 10);
        wiggleProp(this, 'y', -10, 10);
    });
}

function wiggleProp(element, prop, min, max) {
    var duration = Math.random() * 2 + 2;

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
    min = $(".mainLayer").position().left,
    max = $(window).width() * 1.5 - $(".mainLayer").width(),
    mainLayerWidth = $(".mainLayer").width(),
    friction = 0.95;

    // Get all layers in the table
    $(".paraLayer").each(function(index) {
        
        var currentLayer = $(this);
        var layerPos = currentLayer.position().left;
        var layerSpeed = currentLayer.data('depth');
        var width = mainLayerWidth + (mainLayerWidth * layerSpeed / mainLayerWidth)

        layers[index] = {
            layer: currentLayer,
            position: layerPos,
            speed: layerSpeed
        };

        // Size the layers
        if(layerSpeed < 1){
            currentLayer.width($('.mainLayer').width() * layerSpeed + $(window).width() * 1.5);
        }else{
            currentLayer.width($('.mainLayer').width() * layerSpeed);
        }

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
        if($(".mainLayer").position().left >= max){
            if(sideScroller.velocity > -sideScroller.speed){
                sideScroller.velocity--;
            }
        }else{
            sideScroller.velocity = 0;
        }
    }
    if(keys[37]){
        // Left Arrow
        if($(".mainLayer").position().left <= min){
            if(sideScroller.velocity < sideScroller.speed){
                sideScroller.velocity++;
            }
        }else{
            sideScroller.velocity = 0;
        }
    }

    // Apply resistance
    sideScroller.velocity *= friction;

    // Apply movement to each layers

    // $.each(layers, function(index, layer){
    for(var layer in layers){ 
        //console.log(sideScroller.velocity);
        // Update object data
        layers[layer].position += (sideScroller.velocity * layers[layer].speed);

        // The new position in pixels
        var xPos = layers[layer].position + "px";

        // Apply transformation
        layers[layer].layer.css("transform", "translateX("+ xPos +")");

    };
}

function updateSideScroller(){
    min = $(".mainLayer").position().left;
    max = $(window).width() * 1.5 - $(".mainLayer").width();
}

function dayNightCycle(){
    
    var time = $(".day-night");
    var ciel = $(".ciel");
    var day = $(".jour");

    TweenMax.from(time, 0, { rotation:0, repeat:-1, ease:Linear.easeNone } );
    TweenMax.to(time, 120, { rotation:360, repeat:-1, ease:Linear.easeNone } );

    var animation = new TimelineLite({repeat:-1});
    
    animation.to(ciel, 20, { backgroundColor:"#d9c72b", ease:Linear.easeNone } )
        .to(ciel, 10, { backgroundColor:"#d9552b", ease:Linear.easeNone } )
        .to(ciel, 10, { backgroundColor:"#6e10e8", ease:Linear.easeNone } )
        .to(ciel, 40, { backgroundColor:"#6e10e8", ease:Linear.easeNone } )
        .to(ciel, 10, { backgroundColor:"#e86f1c", ease:Linear.easeNone } )
        .to(ciel, 10, { backgroundColor:"#d9c72b", ease:Linear.easeNone } )
        .to(ciel, 20, { backgroundColor:"#d9c72b", ease:Linear.easeNone } );

    animation.play();

    var animation2 = new TimelineLite({repeat:-1});

    animation2.to(day, 30, { opacity:1, ease:Linear.easeNone } )
        .to(day, 10, { opacity:0, ease:Linear.easeNone } )
        .to(day, 40, { opacity:0, ease:Linear.easeNone } )
        .to(day, 10, { opacity:1, ease:Linear.easeNone } )
        .to(day, 30, { opacity:1, ease:Linear.easeNone } );

    animation2.play();
}

})(jQuery);
