<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @subpackage Sketchpad
 * @since Sketchpad 1.7
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
} ?>
<div id="comments" class="comments-area">
	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'sketchpad' ); ?></p>
	<?php endif; // ! comments_open
	if ( have_comments() ) : ?>
		<h3 class = "comments-title">
			<?php if ( 1 == get_comments_number() )
				printf( __( 'One response to &ldquo; %s &rdquo;', 'sketchpad' ), get_the_title() );
			else
				printf( __( '%d Responses to &ldquo; %s &rdquo;', 'sketchpad' ), get_comments_number(), get_the_title() );
			?>
		</h3>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="pagination">
			<?php echo paginate_comments_links( array(
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			) ); ?>
		</div><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>
	<ol class="comment-list">
		<?php wp_list_comments( array(
				'style'			=> 'ol',
				'reply_text'	=> __( 'Reply', 'sketchpad' ),
				'login_text'	=> __( 'Log in to Reply', 'sketchpad' ),
			) ); ?>
	</ol><!-- .comment-list -->
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="pagination">
			<?php echo paginate_comments_links( array(
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			) ); ?>
		</div><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation
	endif; // have_comments()
		comment_form( array(
			'comment_field'			=> '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'sketchpad' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			'must_log_in'			=> '<p class="must-log-in">' .  sprintf( __( 'You must be ', 'sketchpad' ) . '<a href="%s">' . __( 'logged in', 'sketchpad' ) . '</a>' . __( ' to post a comment.', 'sketchpad' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
			'logged_in_as'			=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as ', 'sketchpad' ) . '<a href="%1$s">%2$s</a>' . '<a href="%3$s" title="' . __( 'Log out of this account', 'sketchpad' ) . '">' . __( ' Log out?', 'sketchpad' ) . '</a>', admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
			'comment_notes_before'	=> '<p class="comment-notes">' . __( 'Your email address will not be published.', 'sketchpad' ) . '</p>',
			'comment_notes_after'	=> '<p class="form-allowed-tags">' . sprintf( __( 'You may use these ', 'sketchpad' ) . '<abbr title="HyperText Markup Language">HTML</abbr>' . __( ' tags and attributes: %s', 'sketchpad' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
			'title_reply'			=> __( 'Leave a Reply', 'sketchpad' ),
			'title_reply_to'		=> __( 'Leave a Reply to %s', 'sketchpad' ),
			'cancel_reply_link'		=> __( 'Cancel reply', 'sketchpad' ),
			'label_submit'			=> __( 'Post Comment', 'sketchpad' )
	) ); ?>
</div><!-- #comments -->