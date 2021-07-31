

<?php
/**
 * The default template for displaying the classic blog content
 *
 * @package Uku
 * @since Uku 1.3
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>

	<?php if ( '' !== get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail fadein">
			<a href="<?php the_permalink(); ?>"><span class="thumb-wrap"><?php the_post_thumbnail(); ?></span></a>
			<?php if ( has_post_format('video') ) : ?>
				<span class="video-icon"><?php esc_html_e('Video', 'uku') ?></span>
			<?php endif; ?>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<header class="entry-header cf#">
		<div class="entry-meta">
			<?php uku_posted_by(); ?>
			<span class="entry-date">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
			</span><!-- end .entry-date -->
			<?php if ( comments_open() ) : ?>
			<span class="entry-comments">
				<?php comments_popup_link(
					'<span class="leave-reply"><span class="comment-name">' . esc_html__( 'Comments', 'uku' ) .  '</span>' . esc_html__( '0', 'uku' ) . '</span>',
					'<span class="comment-name">' . esc_html__( 'Comments', 'uku' ) .  '</span>' . esc_html__( '1', 'uku' ),
					'<span class="comment-name">' . esc_html__( 'Comments', 'uku' ) .  '</span>' . esc_html__( '%', 'uku' ) )
				; ?>
			</span><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( esc_html__( 'Edit Post', 'uku' ), '<span class="entry-edit">', '</span>' ); ?>
		</div><!-- end .entry-meta -->
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- end .entry-header -->

</article><!-- end post -<?php the_ID(); ?> -->
