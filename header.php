<?php
/**
 * The Header template for our theme
 *
 * @subpackage Sketchpad
 * @since      Sketchpad 1.7
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php }
	if ( ! function_exists( 'wp_site_icon' ) && get_theme_mod( 'sketchpad_favicon' ) ) { ?>
		<link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'sketchpad_favicon' ) ); ?>" />
	<?php }
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="main-content">
	<div id="wrapper">
		<header>
			<div class="logo">
				<?php if ( get_header_image() ) { ?>
					<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				<?php }
				if ( function_exists( 'the_custom_logo' ) ) {
					if ( has_custom_logo() ) {
						the_custom_logo();
					}
				} elseif ( get_theme_mod( 'sketchpad_logo' ) ) {
					echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( get_theme_mod( 'sketchpad_logo' ) ) . '" alt="logotype" title="Back home" /></a>';
				} ?>
			</div><!--.logo-->
			<div class="header">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Home" style="color: #<?php header_textcolor(); ?>"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<?php $description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) { ?>
					<h2 class="site-description"><?php echo $description; ?></h2>
				<?php }
				echo get_search_form(); ?>
			</div><!--.header-->
		</header>
		<div class="content">
			<div class="main-content">
				<?php if ( has_nav_menu( 'primary' ) ) { ?>
					<nav>
						<div class="main-navigation"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>
					</nav>
				<?php }
