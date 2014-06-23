<?php
/**
 * The Header template for our theme
 *
 * @subpackage Sketchpad
 * @since Sketchpad 1.7
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 	<meta http-equiv="Content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' );?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php if ( get_theme_mod( 'sketchpad_favicon' ) ) { ?>
			<link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'sketchpad_favicon' ) ); ?>" />
			<link rel="apple-touch-icon" href="<?php echo esc_url( get_theme_mod( 'sketchpad_favicon' ) ); ?>" />
		<?php };
	wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
	<div id="main">
		<div id="wrapper">
			<header>
				<div class="logo">
					<img src="
						<?php if ( $header_image = get_header_image() ) {
								header_image();
							} else {
								echo esc_url( get_template_directory_uri() . '/images/bg-logo.png' ); } ?>
					" alt="Header" />
					<?php if ( get_theme_mod( 'sketchpad_logo' ) ) {
						echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( get_theme_mod( 'sketchpad_logo' ) ) . '" alt="logotype" title="Back home" /></a>';
					} ?>
				</div><!--.logo-->
				<div class="header">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Home" style="color: #<?php header_textcolor(); ?>"><?php bloginfo( 'name' ); ?></a>
					</h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<form class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input class="search-text" size="17" type="search" name="s" placeholder="<?php _e( 'Enter search keyword', 'sketchpad' ) ?>">
						<input class="search-button" type="submit" value="<?php _e( 'search', 'sketchpad' ) ?>">
					</form>
					<hr>
				</div><!--.header-->
			</header>
			<div class="content">
				<div class="main-content">
					<?php if ( has_nav_menu( 'primary' ) ) { ?>
						<nav>
							<div class="main-navigation"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>
						</nav>
					<?php }; ?>