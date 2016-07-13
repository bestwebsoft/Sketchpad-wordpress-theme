<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, display default widget Pages instead navigation menu.
 *
 * @subpackage Sketchpad
 * @since      Sketchpad 1.7
 */
?>
</div><!--.main-content-->
<aside>
	<div class="sidebar">
		<?php if ( is_active_sidebar( 'sidebar' ) ) {
			dynamic_sidebar( 'sidebar' );
		} else { ?>
			<section>
				<header>
					<h4><?php _e( 'Pages: ', 'sketchpad' ); ?></h4>
				</header>
				<ul>
					<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
				</ul>
			</section>
		<?php } ?>
	</div><!--.sidebar-->
</aside>
