<?php
/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {


    if(is_front_page()){

        wp_enqueue_script('fullpageplugin', get_template_directory_uri() . '/plugins/fullPage.js-master/jquery.fullPage.min.js', array('jquery'), false, true);

        wp_enqueue_script('parallax', get_template_directory_uri() . '/plugins/parallax-master/deploy/jquery.parallax.min.js', array('jquery'), false, true);

        wp_enqueue_style('cardslidercss', get_template_directory_uri() . '/plugins/cardslider/cardslider.css');

        wp_enqueue_script('cardslider', get_template_directory_uri() . '/plugins/cardslider/jquery.cardslider.source.js', array('jquery'), false, true);

        wp_enqueue_script('frontpagejs', get_template_directory_uri() . '/js/frontpage.js', array('jquery'));

        wp_enqueue_script('greensock', "https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js");

    }

    wp_enqueue_script('smoothWheel' , get_template_directory_uri() . '/js/jquery.smoothwheel.js', array('jquery'));

    wp_enqueue_script('full-screen-nav' , get_template_directory_uri() . '/plugins/full-screen-nav/main.js', array('jquery'));

    wp_enqueue_script('smooth-scroll' , get_template_directory_uri() . '/plugins/jquery.smooth-scroll.js', array('jquery'));

    wp_enqueue_script('mainscript', get_template_directory_uri() . '/js/script.js', array('jquery'));

	wp_enqueue_style( 'resetCSS', get_template_directory_uri() . '/css/reset.css' );

    wp_enqueue_style('fullpagecss', get_template_directory_uri() .  '/plugins/fullPage.js-master/jquery.fullPage.css');

    wp_enqueue_style('full-screen-nav-style', get_template_directory_uri() .  '/plugins/full-screen-nav/style.css');

    wp_enqueue_style( 'portfolio-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

// Register Custom Post Type
function custom_post_type() {

    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Projects', 'text_domain' ),
        'name_admin_bar'        => __( 'Projects', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Project', 'text_domain' ),
        'description'           => __( 'personnal projects', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'custom-fields', 'post-formats', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-customize',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'project', $args );

}
add_action( 'init', 'custom_post_type', 0 );