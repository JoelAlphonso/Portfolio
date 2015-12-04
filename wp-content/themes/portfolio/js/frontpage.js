/**
 * Created by joel on 31/10/2015.
 */
jQuery(document).ready(function($) {


    //scrollEnabler($);
    //
    //$(window).resize(function() {
    //    scrollEnabler($);
    //});


    $('#scene').parallax({
        calibrateX: true,
        calibrateY: true,
        scalarX: 20,
        scalarY: 15,
        frictionX: 0.1,
        frictionY: 0.2
    });

    $('#projectsSlider').cardSlider();

});



//function scrollEnabler($){
//    if($(window).width() < 600){
//        $.fn.fullpage.setAutoScrolling(false);
//        $.fn.fullpage.setFitToSection(false);
//    }
//    else{
//        $.fn.fullpage.setAutoScrolling(true);
//        $.fn.fullpage.setFitToSection(true);
//    }
//}