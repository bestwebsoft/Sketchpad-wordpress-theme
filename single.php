<?php
/**
 * The template for displaying all single posts
 *
 * @subpackage Sketchpad
 * @since Sketchpad 1.7
 */

get_header(); ?>
		<main>
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() ); ?>
				<p class="prev-post"><?php previous_post_link( '&larr;%link' ); ?></p><!--Previous post navigation-->
				<p class="next-post"><?php next_post_link( '%link&rarr;' ); ?></p><!--Next post navigation-->
				<?php comments_template();
			endwhile; ?>
		</main>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>