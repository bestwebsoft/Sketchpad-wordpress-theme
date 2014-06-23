<?php
/**
 * The template for displaying all pages
 *
 * @subpackage Sketchpad
 * @since Sketchpad 1.7
 */

get_header(); ?>
		<main>
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
				comments_template();
			endwhile; ?>
		</main>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>