<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>
<header class="cd-header">
    <div class="cd-logo"><img class="logo" src="<?php echo get_template_directory_uri() ?>/images/logo-joeldesign.svg" alt="logo"></div>

    <a class="cd-primary-nav-trigger" href="#0">
        <span class="cd-menu-icon"></span>
    </a> <!-- cd-primary-nav-trigger -->
</header>

<nav>
    <ul class="cd-primary-nav">
        <li class="cd-label">MENU</li>
        <li><a href="#apropos">À propos</a></li>
        <li><a href="#competences">Compétences</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>