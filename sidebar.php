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
		} else {
			$args     = array(
				'before_widget' => '<section class="widget %s">',
				'after_widget'  => '</section>',
				'before_title'  => '<header><h4 class="widgettitle">',
				'after_title'   => '</h4></header>',
			);
			$instance = array();
			the_widget( 'WP_Widget_Pages', $instance, $args );
		} ?>
	</div><!--.sidebar-->
</aside>
