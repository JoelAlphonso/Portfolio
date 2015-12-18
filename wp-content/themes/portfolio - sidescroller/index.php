<?php get_header(); ?>

<body <?php body_class(); ?>>

<div class="overlay hidden">
    <div class="overlayExit"></div>
    <div class="overlayOverflow">
        <div class="flexRow">
            <div class="overlayContent">
                <span class="overlayExit">
                    <span><span></span></span>
                    <span><span></span></span>
                </span>

                <div class="content"></div>
            </div>
        </div>

    </div>
</div>

<ul id="scene">
    <li class="layer" data-depth="0.1">
        <div>
            <div class="day-night">
                <div class="nuit"></div>
                <div class="jour"></div>
            </div>
        </div>
        
    </li>
    <li class="layer" data-depth="0.2">
        <div class="paraLayerContainer">
            <div class="paraLayer horizon" data-depth="0.2"></div>
            <div class="paraLayer wiggle nuages-back" data-depth="0.2"></div>
        </div>
    </li>
    <li class="layer" data-depth="0.3">
        <div class="paraLayerContainer">
            <div class="paraLayer mont-back" data-depth="0.3"></div>
            <div class="paraLayer wiggle nuages-middle" data-depth="0.3"></div>
        </div>
    </li>
    <li class="layer" data-depth="0.4">
        <div class="paraLayerContainer">
            <div class="paraLayer mont-middle" data-depth="0.4"></div>
            <div class="paraLayer wiggle nuages-front" data-depth="0.3"></div>
        </div>
    </li>
    <li class="layer" data-depth="0.5">
        <div class="paraLayerContainer">
            <div class="paraLayer mont-front" data-depth="0.5"></div>
        </div>
    </li>
    <li class="layer" data-depth="0.6">
        <div class="paraLayerContainer">
            <div class="paraLayer" data-depth="0.9"></div>
        </div>
    </li>
    <li class="layer" data-depth="0.7">
        <div class="paraLayerContainer">
            <div class="paraLayer mainLayer sol" data-depth="1">
                
            </div>
        </div>
    </li>
    <li class="layer" data-depth="0.8">
        
    </li>
    <li class="layer" data-depth="0.9">
        <div class="paraLayerContainer">
            <div class="paraLayer sous-sol" data-depth="1.1"></div>
        </div>
    </li>
    <li class="layer" data-depth="1">
        
    </li>

</ul>
<div class="ciel"></div>
<?php get_footer(); ?>
</body>
