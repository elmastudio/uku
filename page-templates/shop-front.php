<?php
/**
 * Template Name: Shop Front
 *
 * Description: A page template for the WooCommerce Shop Front Page
 *
 * @package Uku
 * @since Uku 1.2
 * @version 1.0
 */

get_header(); ?>

	<div id="page-start" class="cf">

	<?php
		// Shop Categories
		if ('' != get_theme_mod( 'uku_shopcats_activate' )  ) :
		$title	= get_theme_mod('uku_shopcats_title', esc_html__('Product categories', 'uku'));
		$number = get_theme_mod('uku_shopcats_number', '3');
	?>
		<section id="shopfront-cats" class="shopfront-section cf">
			<?php if ($title) : ?>
				<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
			<?php endif; ?>
			<div class="shopfront-content cf">
				<?php echo do_shortcode('[product_categories number="' . $number . '" columns="12"]'); ?>
			</div><!-- end .shopfront-content -->
		</section><!-- end .front-cats -->

	<?php endif; // shop categories ?>


	<?php
		// Featured Products
		if ('' != get_theme_mod( 'uku_shopfeatured_activate' )  ) :
		$title	= get_theme_mod('uku_shopfeatured_title', esc_html__('Featured products', 'uku'));
		$number = get_theme_mod('uku_shopfeatured_number', '2');
	?>

		<section id="shopfront-featured" class="shopfront-section shopfront-products cf">
			<?php if ($title) : ?>
				<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
			<?php endif; ?>
			<div class="shopfront-content">
				<?php echo do_shortcode('[featured_products per_page="' . intval($number) . '" columns="2"]'); ?>
			</div><!-- end .shopfront-content -->
		</section><!-- end .front-featured -->

	<?php endif; // Featured Products ?>


	<?php
		// Latest Products
		if ('' != get_theme_mod( 'uku_shoplatest_activate' )  ) :
			$title	= get_theme_mod('uku_shoplatest_title', esc_html__('Latest products', 'uku'));
			$number = get_theme_mod('uku_shoplatest_number', '2');
		?>

			<section id="shopfront-latest" class="shopfront-section shopfront-products cf">
				<?php if ($title) : ?>
				<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
				<?php endif; ?>
				<div class="shopfront-content">
					<?php echo do_shortcode('[recent_products per_page="' . intval($number) . '" columns="3"]'); ?>
				</div><!-- end .shopfront-content -->
			</section><!-- end .front-products -->

	<?php endif; // Latest Products ?>


	<?php
		// Top Rated Products
		if ('' != get_theme_mod( 'uku_shoptoprated_activate' )  ) :
			$title	= get_theme_mod('uku_shoptoprated_title', esc_html__('Top rated products', 'uku'));
			$number = get_theme_mod('uku_shoptoprated_number', '4');
	?>

	<section id="shopfront-toprated" class="shopfront-section shopfront-products cf">
		<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
		<?php endif; ?>
		<div class="shopfront-content">
			<?php echo do_shortcode('[top_rated_products per_page="' . intval($number) . '" columns="3"]'); ?>
		</div><!-- end .shopfront-content -->
	</section><!-- end .front-toprated -->

	<?php endif; // Top Rated Products ?>


	<?php
	// About Section on Shop Front Page
	if ( '' != get_theme_mod( 'uku_shopfront_about_activate' ) ) : ?>
		<?php get_template_part( 'template-parts/front-section-about' ); ?>
	<?php endif; // About Section on Shop Front Page ?>



	<?php
		// On Sale Products
		if ('' != get_theme_mod( 'uku_shopsale_activate' )  ) :
		$title	= get_theme_mod('uku_shopsale_title', esc_html__('On Sale', 'uku'));
		$number = get_theme_mod('uku_shopsale_number', '4');
	?>

	<section id="shopfront-sale" class="shopfront-section shopfront-products cf">
		<?php if ($title) : ?>
			<h2 class="section-title"><span><?php echo esc_html($title); ?></span></h2>
		<?php endif; ?>
		<div class="shopfront-content">
			<?php echo do_shortcode('[sale_products per_page="' . intval($number) . '" columns="3"]'); ?>
		</div><!-- end .shopfront-content -->
	</section><!-- end .front-sale -->

	<?php endif; // On Sale Products ?>

		<?php
		// Blog Section on Shop Front Page
		if ( '' != get_theme_mod( 'uku_shopfront_blog_activate' ) ) : ?>
			<?php get_template_part( 'template-parts/shop-front-blog' ); ?>
		<?php endif; // Blog Section on Shop Front Page ?>

</div><!-- end #page-start -->

<?php get_footer(); ?>
