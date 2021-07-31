<?php
/**
 * The template for the Front Page Post Section Three
 *
 * @package Uku
 * @since Uku 1.0
 * @version 1.0.5
 */
?>

<?php

	$uku_section_three_first_query = new WP_Query( array(
			'posts_per_page'			=> 1,
			'post_status'					=> 'publish',
			'ignore_sticky_posts'	=> 1,
	) );

	$uku_section_three_second_query = new WP_Query( array(
			'posts_per_page' 			=> 4,
			'offset' 							=> 1,
			'post_status'	 				=> 'publish',
			'ignore_sticky_posts'	=> 1,
	) );
?>

<section id="front-section-three" class="front-section cf">
	<div class="section-three-wrap cf">

		<h3 class="front-section-title"><?php esc_html_e('From the Blog', 'uku') ?></h3>

		<div class="section-three-column-one">
			<?php if($uku_section_three_first_query->have_posts()) : ?>
				<?php while($uku_section_three_first_query->have_posts()) : $uku_section_three_first_query->the_post() ?>
					<?php get_template_part('template-parts/content-frontpost-big' ); ?>
				<?php endwhile; ?>
			<?php endif; // have_posts() ?>
		</div><!-- end .section-three-column-one -->

		<div class="section-three-column-two">
		<?php if($uku_section_three_second_query->have_posts()) : ?>
			<?php while($uku_section_three_second_query->have_posts()) : $uku_section_three_second_query->the_post() ?>
				<?php get_template_part('template-parts/content-frontpost-small' ); ?>
			<?php endwhile; ?>
		<?php endif; // have_posts() ?>
		</div><!-- end .section-three-column-two -->

		<?php wp_reset_postdata(); ?>

	</div><!-- end .section-three-wrap -->
</section><!-- end #front-section-three -->
