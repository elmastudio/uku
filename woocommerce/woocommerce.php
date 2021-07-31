<?php
/**
 * Woocommerce functions
 *
 * @package Uku
 * @since Uku 1.2
 * @version 1.0.2
 */

//Check if Woocommerce is active
function uku_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

if ( !uku_woocommerce_active() )
return;

	//Check if Woocommerce is active
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 790,
		'single_image_width' => 790,
	) );
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
			return 'woocommerce_thumbnail';
	} );	

	// Image ratio for product images
	function uku_woocommerce_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

		update_option( 'woocommerce_thumbnail_cropping', 'custom' );
		update_option( 'woocommerce_thumbnail_cropping_custom_width', 4 );
		update_option( 'woocommerce_thumbnail_cropping_custom_height', 3 );
	}
	add_action( 'after_switch_theme', 'uku_woocommerce_image_dimensions', 1 );

	//Add product gallery features
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

/*-----------------------------------------------------------------------------------*/
/* WooCommerce Customizations & Hooks
/*-----------------------------------------------------------------------------------*/

// Adds custom WooCommerce CSS
function uku_woocommerce_scripts() {
	wp_enqueue_style( 'uku-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css' );
}
add_action( 'wp_enqueue_scripts', 'uku_woocommerce_scripts' );

// Remove title on shop page
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
	return false;
}

// Remove breadcrump nav
add_action( 'init', 'uku_remove_wc_breadcrumbs' );
function uku_remove_wc_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

// Change number or related products
function woo_related_products_limit() {
	global $product;

	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
	function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 1; // arranged in 1 column
	return $args;
}


// Add 4 images to the Featured Image gallery
add_filter ( 'woocommerce_product_thumbnails_columns', 'xx_thumb_cols' );
	function xx_thumb_cols() {
	return 5; // .last class applied to every 5th thumbnail
}

// Number of products per page in shop.
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


// Custom Sale translation text
add_filter('woocommerce_sale_flash', 'avia_change_sale_content', 10, 3);
	function avia_change_sale_content($content, $post, $product){
	$content = '<span class="onsale">'.esc_html__( 'Sale', 'uku' ).'</span>';
	return $content;
}

// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


// Remove sidebar on product pages
add_action('template_redirect', 'uku_woocommerce_remove_sidebar_shop');
function uku_woocommerce_remove_sidebar_shop() {
		if ( is_checkout() || is_cart() || is_product() ) {
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
		}
}


// Create custom shop sidebar
function uku_woocommerce_widgets_init() {

register_sidebar( array (
	'name'          => esc_html__( 'Shop Sidebar', 'uku' ),
	'id'            => 'sidebar-shop',
	'description'   => esc_html__( 'Widgets for the sidebar on the WooCommerce shop page.', 'uku' ),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget'  => "</section>",
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
) );

}
add_action( 'widgets_init', 'uku_woocommerce_widgets_init' );

// Add custom shop sidebar
add_action('generate_woocommerce_sidebars','generate_construct_sidebars');
function generate_construct_sidebars()
{
	get_sidebar('shop');

}

// customize WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'uku_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'uku_wrapper_end', 10);

function uku_wrapper_start() {
	echo '<div id="shop-container" class="cf">';
	echo '<section id="shop-content">';
}

function uku_wrapper_end() {
	echo '</section>';
	get_sidebar('shop');
	echo '</div>';
}


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
				ob_start();
				?>
				<a class="cart-btn" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View Cart', 'uku' ); ?>">
					<span class="btn-text"><?php esc_html_e('Cart', 'uku') ?></span>
					<span class="cart-count"><?php echo sprintf ( esc_html__('%d', 'uku'), WC()->cart->cart_contents_count ); ?></span>
				</a>
				<?php

				$fragments['a.cart-btn'] = ob_get_clean();

				return $fragments;
}

// Display product category descriptions under category image/title on woocommerce shop page
add_action( 'woocommerce_after_subcategory_title', 'my_add_cat_description', 12);
function my_add_cat_description ($category) {
$cat_id=$category->term_id;
$prod_term=get_term($cat_id,'product_cat');
$description=$prod_term->description;
echo '<div class="shop_cat_desc">'.$description.'</div>';
}

// Removes products count after categories name
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );

function woo_remove_category_products_count() {
	return;
}

// Add img-wrap CSS class to products and product categories
add_action( 'woocommerce_before_shop_loop_item_title', create_function('', 'echo "<div class=\"img-wrap\">";'), 5, 2);
add_action( 'woocommerce_before_shop_loop_item_title',create_function('', 'echo "</div>";'), 12, 2);

add_action( 'woocommerce_before_subcategory_title', create_function('', 'echo "<div class=\"img-wrap\">";'), 5, 2);
add_action( 'woocommerce_before_subcategory_title',create_function('', 'echo "</div>";'), 12, 2);

add_action( 'woocommerce_before_single_product_summary', create_function('', 'echo "<div class=\"product-wrap\">";'), 5, 2);
add_action( 'woocommerce_after_single_product_summary', create_function('', 'echo "</div>";'), 12, 2);

// Add image size for categories
function uku_shop_category_image_size() {
	 add_image_size( 'shop_category_image_size', 740, 986, true );
}

add_action( 'after_setup_theme', 'uku_shop_category_image_size' );

function uku_return_shop_category_image_size($u)
{
		return array(740, 986, true);
}
add_filter('subcategory_archive_thumbnail_size', 'uku_return_shop_category_image_size');
