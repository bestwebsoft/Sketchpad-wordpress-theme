<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage Sketchpad
 * @since Sketchpad 1.7
 */

get_header(); ?>
			<main>
				<article <?php post_class(); ?>>
					<header>
						<h3 class="post-title"><?php _e( 'Page not Found...', 'sketchpad' ); ?></h3>
					</header>
					<p><?php _e( 'Try using the search form', 'sketchpad' ); ?></p>
					<form class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input class="search-text" size="17" type="search" name="s" placeholder="<?php _e( 'Enter search keyword', 'sketchpad' ) ?>">
						<input class="search-button" type="submit" value="<?php _e( 'search', 'sketchpad' ) ?>">
					</form>
				</article>
			</main>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>