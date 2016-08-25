<?php
/**
 *Functions and definitions.
 *
 * @subpackage Sketchpad
 * @since      Sketchpad 1.7
 */

if ( ! isset( $content_width ) ) {
	$content_width = 590;
}

function sketchpad_setup() {
	/* Makes Sketchpad available for translation */
	load_theme_textdomain( 'sketchpad', get_template_directory() . '/languages' );

	/* This theme support wp_nav_menu() in one location */
	register_nav_menu( 'primary', __( 'Primary menu', 'sketchpad' ) );

	/* This theme supports for post thumbnails */
	add_theme_support( 'post-thumbnails' );

	/* Adds RSS feed links to <head> for posts and comments. */
	add_theme_support( 'automatic-feed-links' );

	/* This theme supports a variety of post formats */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
	) );

	/* This theme supports custom logo image. */
	$args = array(
		'width'              => 715,
		'height'             => 117,
		'uploads'            => true,
		'default-text-color' => '776B53',
		'header-text'        => true,
		'default-image'      => get_template_directory_uri() . '/images/bg-logo.png',
	);
	add_theme_support( 'custom-header', $args );

	/* This theme supports custom background color and image. */
	add_theme_support( 'custom-background', array( 'default-color' => 'AF9F88' ) );

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo', array(
		'height'      => 72,
		'width'       => 162,
		'flex-height' => false,
		'flex-width'  => false,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/* This theme supports to style the visual editor. */
	add_editor_style( get_template_directory_uri() . 'css/editor_style.css' );
}

function register_sketchpad_widgets() {
	/* This theme support widget sidebar. */
	register_sidebar( array(
		'name'          => __( 'Right Sidebar Widget', 'sketchpad' ),
		'id'            => 'sidebar',
		'description'   => __( 'Right Widget Area', 'sketchpad' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h4 class="widgettitle">',
		'after_title'   => '</h4></header>',
	) );
}

/* Load scripts and styles */
function sketchpad_script() {
	wp_enqueue_style( 'google-open-sans', '//fonts.googleapis.com/css?family=Open+Sans', array() );
	wp_enqueue_style( 'sketchpad-style', get_template_directory_uri() . '/style.css' );

	// Load the Internet Explorer specific stylesheet & scripts.
	wp_enqueue_style( 'sketchpad-ie', get_template_directory_uri() . '/css/ie.css' );
	wp_style_add_data( 'sketchpad-ie', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'sketchpad-ie-html5', get_template_directory_uri() . '/js/html5.js' );
	wp_script_add_data( 'sketchpad-ie-html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'sketchpad-ie-IE9', get_template_directory_uri() . '/js/IE9.js' );
	wp_script_add_data( 'sketchpad-ie-IE9', 'conditional', 'lt IE 9' );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Auto calculate height of .content */
	wp_enqueue_script( 'sketchpad-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), false, true );
}

/**
 * Sets up the logo and favicon via customizer.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function sketchpad_customize_register( $wp_customize ) {
	/* Site logo */
	if ( ! function_exists( 'the_custom_logo' ) ) {
		$wp_customize->add_setting( 'sketchpad_logo', array(
			'default'           => get_template_directory_uri() . '/images/logo.png',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sketchpad_logo', array(
			'label'       => __( 'Logo (supported formats: .jpg, .png, .gif)', 'sketchpad' ),
			'section'     => 'title_tagline',
			'description' => __( 'Upload a logo to be displayed on the left above the header', 'sketchpad' ),
		) ) );
	}

	/* Site icon */
	if ( ! function_exists( 'wp_site_icon' ) ) {
		$wp_customize->add_setting( 'sketchpad_favicon', array(
			'default'           => get_template_directory_uri() . '/images/favicon.ico',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'sketchpad_favicon', array(
			'label'       => __( 'Site icon (supported formats: .jpg, .png, .gif)', 'sketchpad' ),
			'section'     => 'title_tagline',
			'description' => __( 'The Site Icon is used as a browser and app icon for your site.', 'sketchpad' ),
		) ) );
	}
}

/* style for site title */
function sketchpad_header() { ?>
	<style type="text/css">
		<?php if ( ! display_header_text() ) { ?>
			.site-title,
			.site-description {
				display: none;
			}
		<?php } else { ?>
			.site-title a,
			.site-title p,
			.site-description {
				color: <?php echo '#' . get_header_textcolor(); ?>;
			}
		<?php } ?>
	</style>
<?php }

add_action( 'after_setup_theme', 'sketchpad_setup' );
add_action( 'widgets_init', 'register_sketchpad_widgets' );
add_action( 'wp_enqueue_scripts', 'sketchpad_script' );
add_action( 'customize_register', 'sketchpad_customize_register', 11 );
add_action( 'wp_head', 'sketchpad_header' );
