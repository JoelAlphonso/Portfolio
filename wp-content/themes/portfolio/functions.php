<?php
/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {
	wp_enqueue_style( 'resetCSS', get_template_directory_uri() . '/css/reset.css' );

	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );