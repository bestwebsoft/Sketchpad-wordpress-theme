<?php
/**
 * The template for displaying all single images posts.
 *
 * @subpackage Sketchpad
 * @since Sketchpad 1.7
 */

get_header(); ?>
		<main>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<header>
						<div class="post-header">
							<h3 class="post-title"><?php the_title(); ?></h3>
						</div><!--.post-header-->
						<div class="post-meta">
							<time class="post-date" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time>
							<?php edit_post_link( __( 'edit','sketchpad' ) ); ?>
							<span class="by-author">
								<?php _e( 'posted by ', 'sketchpad' ) . the_author_posts_link();
									if ( has_category() )
										_e( ' in ', 'sketchpad' ) . the_category( ', ' ); ?>
							</span>
						</div><!--.post-meta-->
					</header>
					<div class="post-content">
						<p>
							<?php $metadata = wp_get_attachment_metadata();
								printf( __( 'Full size is %s pixels', 'sketchpad' ), 
									sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										wp_get_attachment_url(),
										esc_attr( __( 'Link to full-size image', 'sketchpad' ) ),
										$metadata['width'],
										$metadata['height']
								) 
							); ?>
						</p>
						<div class="attachment">
							<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="<?php _e( 'Click to full-size image: ', 'sketchpad' ) . the_title_attribute(); ?>" rel="attachment">
								<?php echo wp_get_attachment_image( $post->ID, 'large' ); ?>
							</a>
							<?php the_excerpt();
							the_content(); ?>
                        </div>
                        <div class="pagination"> <!--Attachments navigation-->
							<?php previous_image_link( false, '&laquo; ' . __( 'Previous Image', 'sketchpad' ) . '' );
							echo '&nbsp;';
							next_image_link( false, '' . __( 'Next Image', 'sketchpad' ) . ' &raquo;' ); ?>
						</div>
					</div><!--.post-content-->
					<footer>
						<?php wp_link_pages( array( /*post pagination*/
							'before'		=> '<div class="pagination">' . __( 'Pages:', 'sketchpad' ),
							'after'			=> '</div>', ) );
						if ( has_tag() ) { /* display if has tags */
							echo '<div class="post-tag">';
							the_tags( __( 'Tags: ', 'sketchpad') );
							echo '</div>';
						} ?>
						<p class="prev-post"><?php previous_post_link( '&larr;%link' ); ?></p><!--Previous post navigation-->
						<p class="next-post"><?php next_post_link( '%link&rarr;' ); ?></p><!--Next post navigation-->
					</footer>
				</article>
			<?php comments_template();
			endwhile; ?>
		</main>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>