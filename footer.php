<?php
/**
 * The template for displaying the footer
 *
 * @subpackage Sketchpad
 * @since Sketchpad 1.7
 */
?>
				</div><!--.content-->
				<footer>
					<div class="footer">
						<div class="site-info">
							<span class="left">
								<?php echo '&copy; ' . date( 'Y ' ) . get_bloginfo( 'name' ); ?>
							</span>
							<span class="right">
								<?php printf( __( 'Powered by %s and %s', 'sketchpad' ) ,
									'<a href = "' . esc_url( 'https://github.com/bestwebsoft/' ) . '">BestWebSoft</a>',
									'<a href = "' . esc_url( 'http://wordpress.org/' ) . '">WordPress</a>' ); ?>
							</span>
						</div><!--.site-info-->
					</div><!--.footer-->
				</footer>
			</div><!--#wrapper-->
		</div><!--#main-->
	<?php wp_footer(); ?>
	</body>
</html>