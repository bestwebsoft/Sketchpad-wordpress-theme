				<article <?php post_class(); ?>>
					<header>
						<div class="post-header">
							<h3 class="post-title">
								<?php if ( is_singular() && !is_page() ) the_title();
									elseif ( is_page() ) _e( 'Page: ', 'sketchpad' ) . the_title();
									else echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>'; ?>
							</h3>
						</div><!--.post-header-->
						<div class="post-meta">
							<?php if ( is_page() ) edit_post_link( __( 'edit','sketchpad' ) );
								else { ?>
								<time class="post-date" datetime="<?php the_time( 'Y-m-d' ); ?>">
									<?php if ( is_singular() ) echo get_the_date();
										else echo '<a href="' . get_permalink() . '">' . get_the_date() . '</a>'; ?>
								</time>
								<?php edit_post_link( __( 'edit','sketchpad' ) ); ?>
								<span class="by-author">
									<?php if ( !is_author() ) _e( 'posted by ', 'sketchpad' ) . the_author_posts_link();
										if ( ( !is_page() || !is_category() ) && has_category() ) _e( ' in ', 'sketchpad' ) . the_category( ', ' ); ?>
								</span>
							<?php } ?>
						</div><!--.post-meta-->
					</header>
					<div class="post-content">
						<?php if ( is_singular() ) the_post_thumbnail( 'featured-image' );
							else { if ( has_post_thumbnail() ) { ?>
								<a class="thumb-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php } };
						the_content(); ?>
					</div><!--.post-content-->
					<footer>
						<?php wp_link_pages( array( /*post pagination*/
							'before'	=> '<div class="pagination">' . __( 'Pages:', 'sketchpad' ),
							'after'		=> '</div>', ) );
						if ( !is_singular() && ( get_comments_number() > 0 ) ) { ?>
							<div class="post-footer">
								<a class="comments-link" href="<?php the_permalink(); ?>#comments"><?php _e( 'read comments', 'sketchpad' ); echo ' (' . ( get_comments_number() ) . ')'; ?></a>
							</div><!--.post-footer-->
						<?php }
						if ( has_tag() ) { /* display if has tags */
							echo '<div class="post-tag">';
							the_tags( __( 'Tags: ', 'sketchpad') );
							echo '</div>';
						} ?>
					</footer>
				</article>