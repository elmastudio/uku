<?php
/**
 * The template for displaying Comments.
 *
 * @package Uku
 * @since Uku 1.0
 * @version 1.0.3
 */

 /*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area cf">

	<?php if ( '' != get_theme_mod( 'uku_hidecomments' ) ) : ?>
		<button id="comments-toggle"><span class="comments-title"><?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'uku' ), number_format_i18n( get_comments_number() ) ); ?></span></button>
	<?php else : ?>
		<h3 class="comments-title">
		<?php
			printf(
				esc_html( _nx( '1 comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'uku' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
		?>
		</h3>
	<?php endif; ?>

	<div class="comments-content cf">

	<?php if ( have_comments() ) : ?>
		<ol class="commentlist">
		<?php
			wp_list_comments( array(
				'avatar_size'	=> 140,
				'style'     	=> 'li',
				'short_ping'	=> true,
				'format'    	=> 'html5',
				'callback' => 'uku_comments_callback',
			) );
		?>
		</ol><!-- end .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="nav-comments">
				<div class="nav-previous"><?php previous_comments_link( ( '<span>' . esc_html__( 'Older Comments', 'uku' ) . '</span>' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( ( '<span>' . esc_html__( 'Newer Comments', 'uku' ) . '</span>' ) ); ?></div>
			</nav><!-- end #comment-nav -->
			<?php endif; // check for comment navigation ?>

		<?php
			// If comments are closed and there are no comments, let's leave a little note, shall we?
			if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'uku' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

	</div><!-- end .comments-content -->
</div><!-- end #comments .comments-area -->
