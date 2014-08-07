<?php

function sketchpad_setup() {
	global $content_width;
	/* Makes Sketchpad available for translation */
	load_theme_textdomain( 'sketchpad', get_template_directory() . '/languages' );

	/* This theme support wp_nav_menu() in one location */
	register_nav_menu( 'primary', __( 'Primary menu', 'sketchpad' ) );

	/* This theme supports for post thumbnails */
	add_theme_support( 'post-thumbnails' );

	/* Adds RSS feed links to <head> for posts and comments. */
	add_theme_support( 'automatic-feed-links' );

	/* This theme supports a variety of post formats */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );

	/* This theme supports custom logo image. */
	$args = array(
		'width'					=> 715,
		'height'				=> 117,
		'uploads'				=> true,
		'default-text-color'	=> '776B53',
		'header-text'			=> true
	);
	add_theme_support( 'custom-header', $args );

	/* This theme supports custom background color and image. */
	add_theme_support( 'custom-background', array( 'default-color' => 'AF9F88' ) );

	/* This theme supports to style the visual editor. */
	add_editor_style( get_template_directory_uri() . 'css/editor_style.css' );

	if ( ! isset( $content_width ) )
	$content_width = 590;
}

function register_sketchpad_widgets() {
	/* This theme support widget sidebar. */
	register_sidebar( array(
		'name'			=> 'Right Sidebar Widget',
		'id'			=> 'sidebar',
		'description'	=> 'Right Widget Area',
		'before_widget'	=> '<section>',
		'after_widget'	=> '</section>',
		'before_title'	=> '<header><h4>',
		'after_title'	=> '</h4></header>',
	) );
}

/* Wp Title */
function sketchpad_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'sketchpad' ), max( $paged, $page ) );
	}
	return $title;
}

/* Load scripts and styles */
function sketchpad_script() {
	wp_enqueue_style( 'google-open-sans' , '//fonts.googleapis.com/css?family=Open+Sans', array() );
	wp_enqueue_style( 'sketchpad_style', get_template_directory_uri() . '/style.css' );

	// Load the Internet Explorer specific stylesheet & scripts.
	global $wp_styles;
	wp_enqueue_style( 'sketchpad_ie', get_template_directory_uri() . '/css/ie.css' );
	$wp_styles->add_data( 'sketchpad_ie', 'conditional', 'lt IE 9' );
	global $wp_scripts;
	wp_enqueue_script( 'sketchpad_ie_html5', get_template_directory_uri() . '/js/html5.js' );
	$wp_scripts->add_data( 'sketchpad_ie_html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'sketchpad_ie_IE9', get_template_directory_uri() . '/js/IE9.js' );
	$wp_scripts->add_data( 'sketchpad_ie_IE9', 'conditional', 'lt IE 9' );

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}

/* Add logo and favicon handler */
function sketchpad_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'sketchpad_logo_section', array(
		'title'			=> __( 'Logo & Favicon', 'sketchpad' ),
		'priority'		=> 30,
		'description'	=> __( 'Upload a logo to be displayed on the left above the header', 'sketchpad' ),
	));
	$wp_customize->add_setting( 'sketchpad_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sketchpad_logo', array(
		'label'		=> __( 'Logo (supported formats: .jpg, .png, .gif)', 'sketchpad' ),
		'section'	=> 'sketchpad_logo_section',
		'settings'	=> 'sketchpad_logo',
	)));
	$wp_customize->add_setting( 'sketchpad_favicon' );
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'sketchpad_favicon', array(
		'label'		=> __( 'Favicon (supported formats: .ico, .jpg, .png, .gif)', 'sketchpad' ),
		'section'	=> 'sketchpad_logo_section',
		'settings'	=> 'sketchpad_favicon',
	)));
}

/* Auto calculate height of .content */
function sketchpad_content_height() {
	wp_enqueue_script( 'sketchpad_script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ) );
}

add_action( 'after_setup_theme', 'sketchpad_setup' );
add_action( 'widgets_init', 'register_sketchpad_widgets' );
add_filter( 'wp_title', 'sketchpad_wp_title', 10, 2 );
add_action( 'wp_enqueue_scripts', 'sketchpad_script' );
add_action( 'customize_register', 'sketchpad_customize_register' );
add_filter( 'wp_footer', 'sketchpad_content_height' );
