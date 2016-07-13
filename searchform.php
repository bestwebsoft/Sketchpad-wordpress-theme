<?php
/**
 * The template for displaying search form
 *
 * @subpackage Sketchpad
 * @since      Sketchpad 1.9
 */
?>

<form class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input class="search-text" size="17" type="search" name="s" placeholder="<?php esc_attr_e( 'Enter search keyword', 'sketchpad' ) ?>" value="<?php the_search_query(); ?>">
	<input class="search-button" type="submit" value="<?php _e( 'search', 'sketchpad' ) ?>">
</form>
