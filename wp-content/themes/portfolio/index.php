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

<!-- FULLPAGE ID -->
<div id="fullpage">

    <!--  SECTION 1  -->
    <section class="section">
        <div class="vWrapper">
            <ul id="scene">
                <li class="layer" data-depth="0.1">
                    <div class="flexRow">
                        <div class="flexCol"></div>
                        <div class="flexCol"></div>
                    </div>
                </li>
                <li class="layer" data-depth="0.2">
                    <div class="parallaxObject">
                        <div class="logoContainer">
                            <img class="logo" src="<?php echo get_template_directory_uri() ?>/images/logo-joeldesign.svg" alt="logo">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.3">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-10vw; top:6vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle3.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:9vw; top:5vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect1.png" alt="rectangle">
                        </div>
                        <div class="symbol" style="left:32vw; top:5vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect8.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.4">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-8vw; top:-2vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle1.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:12vw; top:-7vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect2.png" alt="rectangle">
                        </div>
                        <div class="symbol" style="left:39vw; top:22vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect11.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.5">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-9vw; top: -10vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle2.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:15vw; top:5vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect3.png" alt="rectangle">
                        </div>
                        <div class="symbol" style="left:-26vw; top: -2vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle8.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:-16vw; top: 2vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle5.png" alt="circle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.6">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-18vw; top: -16vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle4.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:26vw; top:0vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect6.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.7">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:22vw; top:11vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect5.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.75">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-22vw; top: 15vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle6.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:23vw; top:-7vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect4.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.8">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-28vw; top: -5vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle7.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:30vw; top:15vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect7.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.85">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:38vw; top:-18vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect9.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.9">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-32vw; top: 25vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle9.png" alt="circle">
                        </div>
                        <div class="symbol" style="left:41vw; top:5vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/rect10.png" alt="rectangle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.95"></li>
                <li class="layer" data-depth="1">
                    <div class="parallaxObject">
                        <div class="symbol" style="left:-40vw; top: -20vh;">
                            <img class="wiggle" src="<?php echo get_template_directory_uri() ?>/images/circle10.png" alt="circle">
                        </div>
                    </div>
                </li>
                <li class="layer" data-depth="0.1">
                    <div class="flexRow">
                        <div class="flexCol">
                            <h2 class="creative">Créativité</h2>
                        </div>
                        <div class="flexCol">
                            <h2>Logique</h2>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!--  SECTION 2  -->
    <section id="apropos" class="section">
        <div class="vWrapperDesktop">
            <div class="content-window">
                <div data-type="background" data-speed="2"></div>
            </div>


            <div class="content">

                <img class="myFace" src="<?php echo get_template_directory_uri() ?>/images/joel-face.png" srcset="<?php echo get_template_directory_uri() ?>/images/joel-face.png 1x, <?php echo get_template_directory_uri() ?>/images/joel-face@2x.png 2x" alt="myFace">

                <div class="presentation">
                    <h1>{ Joel Alphonso }</h1>

                    <div class="flexResponsiveRow"><p>Développeur</p>

                        <p><span> | </span></p>

                        <p>Programmeur</p>

                        <p><span> | </span></p>

                        <p>Designer</p></div>
                    <div>
                        <a class="btnLight" href="http://joeldesign.ca/Joel Alphonso_Curriculum Vitae.pdf" target="_blank">
                            Télécharger CV </a>
                    </div>
                </div>


            </div>
    </section>

    <!--  SECTION 3  -->
    <section id="competences" class="section">
        <div class="vWrapperDesktop">
            <div class="upperSection">

                <div class="flexRow">
                    <div>
                        <h2>Compétences et objectif</h2>

                        <p>Je suis quelqu'un qui recherche l'accomplissement et les défis. Travailler dans une entreprise qui me permettrait de participer au plus grand nombre d'étapes d'un
                            même projet, autant pour la partie créative que la partie programmation, et qui offrirait des
                            possibilités d'avancement en gestion de projet, me permettrait de m'approcher de l'accomplissement.</p>
                    </div>

                    <div class="flexCol">
                        <div class="flexRow compContainer">

                            <div class="designComp">
                                <div class="flexRow">

                                    <div class="flexCol">
                                        <p>Design</p>

                                        <p>Ae</p>

                                        <p>PS</p>

                                        <p>AI</p>

                                        <p>Sketch</p>

                                    </div>
                                    <div class="flexCol">
                                        <div class="cStatContainer">
                                            <div class="statOverflow" style="width:100%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cStatContainer">
                                            <div class="statOverflow" style="width:80%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cStatContainer">
                                            <div class="statOverflow" style="width:60%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cStatContainer">
                                            <div class="statOverflow" style="width:80%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cStatContainer">
                                            <div class="statOverflow" style="width:100%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="progComp">

                                <div class="flexRow">

                                    <div class="flexCol">
                                        <p>HTML</p>

                                        <p>CSS</p>

                                        <p>jQuery</p>

                                        <p>Wordpress</p>

                                        <p>PHP</p>

                                        <p>C#</p>
                                    </div>

                                    <div class="flexCol">

                                        <div class="sStatContainer">
                                            <div class="statOverflow" style="width:90%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sStatContainer">
                                            <div class="statOverflow" style="width:100%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sStatContainer">
                                            <div class="statOverflow" style="width:90%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sStatContainer">
                                            <div class="statOverflow" style="width:80%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sStatContainer">
                                            <div class="statOverflow" style="width:80%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sStatContainer">
                                            <div class="statOverflow" style="width:70%;">
                                                <div>
                                                    <span></span><span></span><span></span><span></span><span></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="underSection">
                <div class="flexResponsiveRow">
                    <div class="flexCol">
                        <img src="<?php echo get_template_directory_uri() ?>/images/feat-icon-1.svg" alt="feat-1">

                        <p>Programmation Front-End</p>
                    </div>
                    <div class="flexCol">
                        <img src="<?php echo get_template_directory_uri() ?>/images/feat-icon-2.svg" alt="feat-2">

                        <p>Design</p>
                    </div>
                    <div class="flexCol">
                        <img src="<?php echo get_template_directory_uri() ?>/images/feat-icon-3.svg" alt="feat-3">

                        <p>Programmation Back-end</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  SECTION 4  -->
    <section id="portfolio" class="section">

        <div class="vWrapperDesktop">

            <div id="projectsSlider" class="cardslider">

                <?php
                $args = array(
                        'posts_per_page' => 100,
                        'post_type' => 'project'
                );
                query_posts($args);
                if (have_posts()) : while (have_posts()) : the_post();
                    ?>
                    <!-- first slide -->
                    <div class="cs-slide">
                        <div class="cs-description">
                            <h2 class="cs-desc-title">Projet <span><?php the_title() ?></span></h2>

                            <div class="cs-desc-content">
                                <!-- item description contents goes here -->
                                <!-- contexte -->
                                <div class="flexRow">
                                    <div class="flexCol">
                                        <p>Contexte</p>
                                    </div>
                                    <div class="flexCol">
                                        <p><?php echo get_field('contexte') ?></p>
                                    </div>
                                </div>

                                <!-- réalisé -->
                                <div class="flexRow">
                                    <div class="flexCol">
                                        <p>Réalisé</p>
                                    </div>
                                    <div class="flexCol">

                                        <?php if (get_field('equipe')): ?>
                                            <p>En équipe de <?php echo get_field('nombre_de_personnes'); ?></p>
                                        <?php else: ?>
                                            <p>Seul</p>
                                        <?php endif; ?>

                                    </div>
                                </div>

                                <!-- Outils -->
                                <div class="flexRow">
                                    <div class="flexCol">
                                        <p>Outils</p>
                                    </div>
                                    <div class="flexCol">
                                        <p><?php echo implode(', ', get_field('outils')); ?></p>
                                    </div>
                                </div>

                                <!-- Compétences -->
                                <div class="flexRow">
                                    <div class="flexCol">
                                        <p>Compétences</p>
                                    </div>
                                    <div class="flexCol">
                                        <p><?php echo get_field('competences'); ?></p>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="flexRow">
                                    <div class="flexCol">
                                        <p>Description</p>
                                    </div>
                                    <div class="flexCol">
                                        <p><?php echo get_field('description'); ?></p>
                                    </div>
                                </div>

                                <?php if (get_field('collaborateurs')): ?>

                                    <!--Collaborateurs-->
                                    <div class="flexRow">
                                        <div class="flexCol">
                                            <p>Collaborateur(s)</p>
                                        </div>
                                        <div class="flexCol">
                                            <?php
                                            $array = get_field('collaborateurs');
                                            $collabs = explode(',', $array);
                                            foreach ($collabs as $collab) {
                                                $collabInfo = explode(';', $collab);
                                                echo '<a href="' . $collabInfo[1] . '" target="_blank"> ' . $collabInfo[0] . '</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <!--btn voir video-->
                                <?php if (get_field('video')): ?>
                                    <a href="javascript:void(0)" data-href="<?php echo get_field('video'); ?>?autoplay=1" class="btnProjet openVideo">Voir
                                        la vidéo</a>
                                <?php endif; ?>

                                <!--btn voir projet-->
                                <?php if (get_field('voir_projet')): ?>
                                    <a href="<?php echo get_field('voir_projet'); ?>" target="_blank" class="btnProjet">Voir
                                        le projet</a>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="cs-media <?php if (get_field('en_ranger')) {
                            echo "tow-in-row";
                        } ?>">

                            <?php
                            $images = get_field('screenshot');
                            foreach ($images as $image):
                                $addClass = "";
                                if ($image['description'] == "ipad") {
                                    $addClass = "ipadSize";
                                } elseif ($image['description'] == "mobile") {
                                    $addClass = "mobileSize";
                                }
                                ?>

                                <a href="javascript:void(0);" data-href="<?php echo $image['url']; ?>" class="cs-media-item showImage <?php echo $addClass; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/></a>

                            <?php endforeach; ?>
                        </div>

                    </div>
                <?php endwhile; endif; ?>

            </div>

        </div>

    </section>

    <!--  SECTION 5  -->
    <section class="section">
        <div class="vWrapperDesktop">

            <div class="flexCol">
                <div class="content">
                    <p>La définition d'un expert</p>

                    <p><span>&ldquo; Quelqu'un qui sait quoi ne pas faire &rdquo;</span></p>

                    <p>- Charles Willson</p>
                </div>
            </div>

        </div>
    </section>

    <!--  SECTION 6  -->
    <section id="contact" class="section">
        <div class="vWrapperDesktop">
            <div class="upperSection">
                <div class="flexRow">
                    <div>
                        <h2>Contactez-moi</h2>

                        <div class="formContainer">
                            <?php echo do_shortcode('[ninja_forms id=13]'); ?>
                        </div>

                    </div>
                    <div class="flexCol">
                        <div>
                            <div class="flexRow">
                                <div class="flexCol"></div>
                                <div class="flexCol">
                                    <h3>Joel Alphonso</h3>
                                </div>
                            </div>
                            <div class="flexRow">
                                <div class="flexCol">
                                    <p><span>Tel</span></p>
                                </div>
                                <div class="flexCol">
                                    <p>514.464.4611</p>
                                </div>
                            </div>
                            <div class="flexRow">
                                <div class="flexCol">
                                    <p><span>Courriel</span></p>
                                </div>
                                <div class="flexCol">
                                    <p>Joel@joeldesign.ca</p>
                                </div>
                            </div>
                            <div class="flexRow">
                                <div class="flexCol"></div>
                                <div class="flexCol">
                                    <hr>
                                </div>
                            </div>
                            <div class="flexRow">
                                <div class="flexCol"></div>
                                <div class="flexCol">
                                    <div>
                                        <a href="https://ca.linkedin.com/in/joël-alphonso-6b5a466a" target="_blank">
                                            <img src="<?php echo get_template_directory_uri() ?>/images/linkedin.png" srcset="<?php echo get_template_directory_uri() ?>/images/linkedin.png 1x, <?php echo get_template_directory_uri() ?>/images/linkedin@2x.png 2x" alt="linkedIn">
                                        </a>
                                        <a href="https://github.com/JoelAlphonso" target="_blank">

                                            <img src="<?php echo get_template_directory_uri() ?>/images/github.png" alt="github" srcset="<?php echo get_template_directory_uri() ?>/images/github.png 1x, <?php echo get_template_directory_uri() ?>/images/github@2x.png 2x" alt="facebook">
                                        </a>

                                        <a href="https://fr.pinterest.com/joelalphonso/" target="_blank">
                                            <img src="<?php echo get_template_directory_uri() ?>/images/pinterest.png" srcset="<?php echo get_template_directory_uri() ?>/images/pinterest.png 1x, <?php echo get_template_directory_uri() ?>/images/pinterest@2x.png 2x" alt="pinterest">
                                        </a>
                                        <a href="https://www.facebook.com/joel.alphonso1" target="_blank"
                                                ><img src="<?php echo get_template_directory_uri() ?>/images/facebook.png" srcset="<?php echo get_template_directory_uri() ?>/images/facebook.png 1x, <?php echo get_template_directory_uri() ?>/images/facebook@2x.png 2x" alt="facebook">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="underSection">
                <div class="flexRow">
                    <div class="flexCol">
                        <div class="flexRow">
                            <a class="btnLight" href="http://joeldesign.ca/Joel Alphonso_Curriculum Vitae.pdf" target="_blank">
                                Télécharger CV </a>
                        </div>
                        <?php get_footer(); ?>
                    </div>
                </div>

            </div>

    </section>

</div>

</body>
