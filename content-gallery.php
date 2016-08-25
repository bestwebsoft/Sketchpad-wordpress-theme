<article <?php post_class(); ?>>
	<header>
		<div class="post-header">
			<h3 class="post-title">
				<?php if ( is_singular() ) {
					the_title();
				} else {
					echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
				} ?>
			</h3>
		</div><!--.post-header-->
		<div class="post-meta">
			<time class="post-date" datetime="<?php the_time( 'Y-m-d' ); ?>">
				<?php if ( is_singular() ) {
					printf( '<a href="%1$s" title="%2$s">%3$s</a>', esc_url( ( is_singular() ) ? get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) : get_the_permalink() ), the_title_attribute( 'echo=0' ), get_the_date() );
				} else {
					echo '<a href="' . get_permalink() . '">' . get_the_date() . '</a>';
				} ?>
			</time>
			<?php edit_post_link( __( 'edit', 'sketchpad' ) ); ?>
			<span class="by-author">
				<?php _e( 'posted by ', 'sketchpad' );
				the_author_posts_link();
				if ( has_category() ) {
					_e( ' in ', 'sketchpad' );
					the_category( ', ' );
				} ?>
			</span>
		</div><!--.post-meta-->
	</header>
	<div class="post-content">
		<?php if ( is_singular() ) {
			the_post_thumbnail( 'featured-image' );
		}
		the_content(); ?>
	</div><!--.post-content-->
	<footer>
		<?php /*post pagination*/
		wp_link_pages( array(
			'before' => '<div class="pagination">' . __( 'Pages:', 'sketchpad' ),
			'after'  => '</div>',
		) );
		if ( ! is_singular() && ( get_comments_number() > 0 ) ) { ?>
			<div class="post-footer">
				<a class="comments-link" href="<?php the_permalink(); ?>#comments"><?php _e( 'read comments', 'sketchpad' );
					echo ' (' . ( get_comments_number() ) . ')'; ?></a>
			</div><!--.post-footer-->
		<?php }
		if ( has_tag() ) { /* display if has tags */
			echo '<div class="post-tag">';
			the_tags( __( 'Tags: ', 'sketchpad' ) );
			echo '</div>';
		} ?>
	</footer>
</article>
