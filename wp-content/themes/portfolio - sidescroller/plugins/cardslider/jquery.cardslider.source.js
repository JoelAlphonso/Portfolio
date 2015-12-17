/**
 * CardSlider
 * Version: v1.0.0
 * URL: http://codecanyon.net/user/hkeyjun
 * Description: A 3D Card-style jQuery Slider Plugin
 * Author: hkeyjun
 * Copyright: Copyright 2015 hkeyjun
 */ 

;
(function ($, document, window, undefined) {
    "use strict";

    var pluginName = 'cardSlider';

    var myPlugin;

    // Default options
    var defaults = {
        shadow: true,
        card3d: true,
        autoPlay: false,
        pauseOnHover: true,
        interval: 5000,
        nav: true,
        dots: true,
        shadowAnimation:true
    };

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options);

        // Attach data to the elment
        this.$el = $(element);
        this.$el.data(pluginName, this);
        this._defaults = defaults;

        this.init();
    }

    Plugin.prototype = {

        init: function () {
            var base = this;
            base.getBrowserStatus();
            base.buildWrap();
            base.initBaseVar();
            base.run();
            base.loadEvents();
        },
        getBrowserStatus: function () {
            var base = this;
            base.css3d = cModernizr.csstransforms3d;
            base.preserve3d = cModernizr.preserve3d;
        },
        buildWrap: function () {
            var base = this;
            base.$el.wrapInner('<div class="cs-slides-holder"></div>');
            base.$slidesHolder = base.$el.find('.cs-slides-holder');
            base.$el.wrapInner('<div class="cs-container"></div>');
            base.$container = base.$el.find('.cs-container');
            base.$slides = base.$el.find('.cs-slide');
            base.$el.find('.cs-media-item').wrapInner('<span class="cs-media-wrap"></span>');
            if (base.css3d) {
                base.$el.addClass('cs-css3d');
            }
            else {
                base.$el.addClass('cs-no-css3d');
            }
            if (base.preserve3d && base.options.shadow) {
                base.$el.find('.cs-media-item').append('<span class="cs-shadow"></span>');
                if(base.options.shadowAnimation)
                {
                    base.$el.addClass('cs-shadow-animation');
                }
            }
            if (base.preserve3d && base.options.card3d) {
                //build faces
                base.$el.addClass('cs-card3d');
                base.$el.find('.cs-media-wrap').each(function () {
                    var src = $(this).find('img').attr('src');
                    $(this).css(
                        {
                            'background': '-webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4)),url(' + src + ')',
                            'background-image': 'linear-gradient(45deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4)),url(' + src + ')'
                        });
                });
            }
            if (base.options.nav && base.$slides.size()> 1) {
                base.$container.append('<a href="#" class="cs-nav-prev"></a><a href="#" class="cs-nav-next"></a>');
                base.$btnPrev = base.$container.find('.cs-nav-prev');
                base.$btnNext = base.$container.find('.cs-nav-next');
            }
            if (base.options.dots && base.$slides.size()> 1) {
                base.$container.append('<span class="cs-dots"></span>');
                base.$dots = base.$container.find('.cs-dots');
                for (var i = 0; i < base.$slides.size(); i++) {
                    base.$dots.append('<a href="#"><span></span></a>')
                }
            }

        },
        initBaseVar: function () {
            var base = this;
            base.timerStaus = 'pause';
            if (base.options.autoPlay) {
                base.timerStaus = 'playing';
            }
            base.timer = setTimeout(function () {
            }, 0);
            base.isHover = false;
            base.transitionEndName = whichTransitionEvent();
            base.effectArray = ['left', 'right', 'top', 'bottom', 'up', 'down'];
            if (!base.preserve3d) {
                base.effectArray = ['left', 'right', 'top', 'bottom'];
            }
        },
        run: function () {
            var base = this;
            base.stepIn(0);
        },
        stepIn: function (index, callback) {
            var base = this;
            clearTimeout(base.timer);
            if (base.css3d) {
                base.$current = base.$slides.eq(index).addClass('cs-current');
                var inEffect = '';
                var dataEffect = base.$current.data('effect-in');
                if (dataEffect && ($.inArray(dataEffect, base.effectArray) >= 0)) {
                    inEffect = dataEffect;
                }
                else {
                    inEffect = randomEffect(base.effectArray);
                }
                inEffect = "cs-" + inEffect;

                var $inMediaItems = base.$current.find('.cs-media-item');
                base.$current.addClass(inEffect);
                $inMediaItems.each(function () {
                    $(this).css('transform');
                });


                var reverseDuration = false;
                if ($.inArray(inEffect, ['cs-left', 'cs-top']) >= 0) {
                    reverseDuration = true;
                }
                autoTransitionDuration($inMediaItems, 1, 0.5, reverseDuration);

                base.$current.addClass('cs-inning cs-show');
                var inMediaCount = $inMediaItems.size();
                var completeInCount = 0;
                var onShowed = function () {
                    //remove Transition Duration
                    $(this).css('transition-duration', '');

                    $(this).addClass('cs-complete');
                    completeInCount++;
                    if (completeInCount == inMediaCount) {
                        base.$current.removeClass('cs-inning ' + inEffect);

                        base.resumeTimer();
                        //waiting
                        base.$current.addClass('cs-waiting');

                        if (callback) {
                            callback();
                        }
                    }
                };

                $inMediaItems.one(base.transitionEndName, onShowed);
            }
            else {
                base.$current = base.$slides.eq(index).addClass('cs-current');
                base.$current.fadeIn(5000);
                base.resumeTimer();
                if (callback) {
                    callback();
                }
            }

            //dots state
            if (base.options.dots) {
                base.$dots.find('.cs-dot-active').removeClass('cs-dot-active');
                $('a', base.$dots).eq(index).addClass('cs-dot-active');
            }

        },
        stepOut: function (index, callback) {
            var base = this;
            if (base.css3d) {
                //remove waiting
                base.$current.removeClass('cs-waiting');
                var outEffect = '';
                var dataEffect = base.$current.data('effect-out');
                if (dataEffect && ($.inArray(dataEffect, base.effectArray) >= 0)) {
                    outEffect = dataEffect;
                }
                else {
                    outEffect = randomEffect(base.effectArray);
                }
                outEffect = "cs-" + outEffect;
                var $outMediaItems = base.$current.find('.cs-media-item');

                var reverseDuration = false;
                if ($.inArray(outEffect, ['cs-right', 'cs-bottom']) >= 0) {
                    reverseDuration = true;
                }
                autoTransitionDuration($outMediaItems, 1, 0.5, reverseDuration);
                //outing
                $outMediaItems.each(function () {
                    $(this).css('transform');
                });
                base.$current.removeClass('cs-show').addClass('cs-outing ' + outEffect);

                var outMediaCount = $outMediaItems.size();
                var completeOutCount = 0;
                var onEnd = function () {
                    $(this).css('transition-duration', '');
                    $(this).removeClass('cs-complete');
                    completeOutCount++;
                    if (completeOutCount == outMediaCount) {
                        base.$current.removeClass('cs-current cs-outing ' + outEffect);
                        base.$current = null;
                        if (callback) {
                            callback();
                        }
                    }
                };

                $outMediaItems.one(base.transitionEndName, onEnd);
            }
            else {
                base.$current.removeClass('cs-current');
                if (callback) {
                    callback();
                }
            }
        },
        resumeTimer: function () {
            var base = this;
            if (base.timerStaus == "playing") {
                if (!base.options.pauseOnHover || (base.options.pauseOnHover && !base.isHover)) {
                    clearTimeout(base.timer);
                    base.timer = setTimeout(function () {
                        base.next();
                    }, base.options.interval);
                }
            }
        },
        goTo: function (index) {
            var base = this;
            base.indexToGo = index;
            if (base.css3d && (base.$current.hasClass('cs-inning') || base.$current.hasClass('cs-outing'))) {
               // do nothing when is animating
            } else {

                var currentIndex = base.$current.index();
                    if(currentIndex != base.indexToGo)
                    {
                        base.stepOut(currentIndex, function () {
                            base.stepIn(base.indexToGo);

                            if($(window).width() < 600){
                                $('.cardslider').height(($('.cs-current .cs-desc-title').outerHeight() + $('.cs-current .cs-desc-content').outerHeight() + 200));
                            }
                        });
                    }



            }
        },
        next: function () {
            var base = this;
            var currentIndex = base.$slides.index(base.$current);
            var nextIndex = currentIndex + 1;
            if (currentIndex == base.$slides.size() - 1) {
                nextIndex = 0;
            }
            base.goTo(nextIndex);
        },
        prev: function () {
            var base = this;
            var currentIndex = base.$slides.index(base.$current);
            var prevIndex = currentIndex - 1;
            if (currentIndex == 0) {
                prevIndex = base.$slides.size() - 1;
            }
            base.goTo(prevIndex);
        },
        loadEvents: function () {
            var base = this;
            base.$el.hover(function () {
                base.isHover = true;
                if (base.timerStaus == "playing" && base.options.pauseOnHover) {
                    clearTimeout(base.timer);
                }
            }, function () {
                base.isHover = false;
                if (base.timerStaus == "playing" && base.options.pauseOnHover) {
                    clearTimeout(base.timer);
                    base.timer = setTimeout(function () {
                        base.next();
                    }, base.options.interval);
                }
            });

            if (base.options.nav) {
                base.$btnNext.on('click.cs', function (evt) {
                    evt.preventDefault();
                    base.next();
                });
                base.$btnPrev.on('click.cs', function (evt) {
                    evt.preventDefault();
                    base.prev();
                });
            }
            if (base.options.dots) {
                base.$dots.on('click.cs','a',function(evt){

                    evt.preventDefault();
                    var index =  $(this).index();
                    base.goTo(index);
                });
            }
        }


    };

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            // prevent multiple instantiations
            if (!$.data(this, 'plugin_' + pluginName)) {
                myPlugin = $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
            }
        });
    };

    $.fn[pluginName].jumpTo = function(index){
        myPlugin.goTo(index);
    };

    var whichTransitionEvent = function () {
        var t, el = document.createElement("fakeelement");

        var transitions = {
            "transition": "transitionend",
            "OTransition": "oTransitionEnd otransitionend",
            "MozTransition": "transitionend",
            "WebkitTransition": "webkitTransitionEnd"
        };

        for (t in transitions) {
            if (el.style[t] !== undefined) {
                return transitions[t];
            }
        }
    };
    var autoTransitionDuration = function ($elements, start, step, reverse) {
        if (reverse) {
            $elements = $($elements.get().reverse());
        }
        $elements.each(function (index) {
            var duration = start + step * index;
            $(this).css({'-webkit-transition-duration': duration + 's', 'transition-duration': duration + 's'});
        });

    };
    var randomEffect = function (effectArray) {
        var effect = Math.floor(Math.random() * effectArray.length);
        return effectArray[effect];
    };

})(jQuery, document, window);
/*! modernizr 3.0.0-alpha.3 (Custom Build) | MIT  *
 * http://v3.modernizr.com/download/#-csstransforms3d-preserve3d !
 * Renamed window.Modernizr to window.cModernizr ,prevent conflicts
 * */
!function(e,n,t){function r(e,n){return typeof e===n}function o(){var e,n,t,o,i,s,f;for(var u in h){if(e=[],n=h[u],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=r(n.fn,"function")?n.fn():n.fn,i=0;i<e.length;i++)s=e[i],f=s.split("."),1===f.length?Modernizr[f[0]]=o:(!Modernizr[f[0]]||Modernizr[f[0]]instanceof Boolean||(Modernizr[f[0]]=new Boolean(Modernizr[f[0]])),Modernizr[f[0]][f[1]]=o),y.push((o?"":"no-")+f.join("-"))}}function i(){var e=n.body;return e||(e=w("body"),e.fake=!0),e}function s(e,n,t,r){var o,s,f,u,a="modernizr",l=w("div"),p=i();if(parseInt(t,10))for(;t--;)f=w("div"),f.id=r?r[t]:a+(t+1),l.appendChild(f);return o=["&#173;",'<style id="s',a,'">',e,"</style>"].join(""),l.id=a,(p.fake?p:l).innerHTML+=o,p.appendChild(l),p.fake&&(p.style.background="",p.style.overflow="hidden",u=C.style.overflow,C.style.overflow="hidden",C.appendChild(p)),s=n(l,e),p.fake?(p.parentNode.removeChild(p),C.style.overflow=u,C.offsetHeight):l.parentNode.removeChild(l),!!s}function f(e,n){return!!~(""+e).indexOf(n)}function u(e,n){return function(){return e.apply(n,arguments)}}function a(e,n,t){var o;for(var i in e)if(e[i]in n)return t===!1?e[i]:(o=n[e[i]],r(o,"function")?u(o,t||n):o);return!1}function l(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function p(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function d(n,r){var o=n.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(p(n[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var i=[];o--;)i.push("("+p(n[o])+":"+r+")");return i=i.join(" or "),s("@supports ("+i+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return t}function c(e,n,o,i){function s(){a&&(delete k.style,delete k.modElem)}if(i=r(i,"undefined")?!1:i,!r(o,"undefined")){var u=d(e,o);if(!r(u,"undefined"))return u}var a,p,c,m,v;for(k.style||(a=!0,k.modElem=w("modernizr"),k.style=k.modElem.style),c=e.length,p=0;c>p;p++)if(m=e[p],v=k.style[m],f(m,"-")&&(m=l(m)),k.style[m]!==t){if(i||r(o,"undefined"))return s(),"pfx"==n?m:!0;try{k.style[m]=o}catch(y){}if(k.style[m]!=v)return s(),"pfx"==n?m:!0}return s(),!1}function m(e,n,t,o,i){var s=e.charAt(0).toUpperCase()+e.slice(1),f=(e+" "+b.join(s+" ")+s).split(" ");return r(n,"string")||r(n,"undefined")?c(f,n,o,i):(f=(e+" "+z.join(s+" ")+s).split(" "),a(f,n,t))}function v(e,n,r){return m(e,t,t,n,r)}var y=[],h=[],g={_version:"3.0.0-alpha.3",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){h.push({name:e,fn:n,options:t})},addAsyncTest:function(e){h.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=g,Modernizr=new Modernizr;var C=n.documentElement,S="CSS"in e&&"supports"in e.CSS,_="supportsCSS"in e;Modernizr.addTest("supports",S||_);var w=function(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):n.createElement.apply(n,arguments)},x="Moz O ms Webkit",b=g._config.usePrefixes?x.split(" "):[];g._cssomPrefixes=b;var z=g._config.usePrefixes?x.toLowerCase().split(" "):[];g._domPrefixes=z;var P=g.testStyles=s,T={elem:w("modernizr")};Modernizr._q.push(function(){delete T.elem});var k={style:T.elem.style};Modernizr._q.unshift(function(){delete k.style}),g.testAllProps=m,g.testAllProps=v,Modernizr.addTest("csstransforms3d",function(){var e=!!v("perspective","1px",!0),n=Modernizr._config.usePrefixes;if(e&&(!n||"webkitPerspective"in C.style)){var t;Modernizr.supports?t="@supports (perspective: 1px)":(t="@media (transform-3d)",n&&(t+=",(-webkit-transform-3d)")),t+="{#modernizr{left:9px;position:absolute;height:5px;margin:0;padding:0;border:0}}",P(t,function(n){e=9===n.offsetLeft&&5===n.offsetHeight})}return e}),Modernizr.addTest("preserve3d",v("transformStyle","preserve-3d")),o(),delete g.addTest,delete g.addAsyncTest;for(var E=0;E<Modernizr._q.length;E++)Modernizr._q[E]();e.cModernizr=Modernizr}(window,document);