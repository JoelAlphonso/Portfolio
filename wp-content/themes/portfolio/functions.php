<?php
/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {

    wp_enqueue_script('fullpageplugin', get_template_directory_uri() . '/plugins/fullPage.js-master/jquery.fullPage.min.js', array('jquery'));

    if(is_front_page()){

        wp_enqueue_script('fullpagejs', get_template_directory_uri() . '/js/fullpage.js', array('jquery'));
    }

    wp_enqueue_script('mainscript', get_template_directory_uri() . '/js/script.js', array('jquery'));

	wp_enqueue_style( 'resetCSS', get_template_directory_uri() . '/css/reset.css' );

    wp_enqueue_style('fullpagecss', get_template_directory_uri() .  '/plugins/fullPage.js-master/jquery.fullPage.css');

    wp_enqueue_style( 'portfolio-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );