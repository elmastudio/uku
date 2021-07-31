<?php
/**
 * Demo Installer content, One Click Demo Import plugin required
 * See: https://wordpress.org/plugins/one-click-demo-import/
 *
 * @package Uku
 * @since Uku 1.2
 * @version 1.0.2
 */

function ocdi_import_files() {
	return array(

		array(
			'import_file_name'             => 'Demo Ruapuke',
			'categories'                   => array( 'WooCommerce' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demos/uku-ruapuke-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demos/uku-ruapuke-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demos/uku-ruapuke-customizer.dat',
			'import_preview_image_url'     => 'https://s3.eu-central-1.amazonaws.com/live-demos/uku-ruapuke-demoimg.jpg',
			'import_notice'            		=> __( 'Make sure you have the WooCommerce plugin and the WP Instagram Widget plugin installed, before importing this demo!', 'uku' ),
		),

		array(
			'import_file_name'             => 'Demo Pirongia',
			'categories'                   => array( 'Magazine' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demos/uku-pirongia-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demos/uku-pirongia-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demos/uku-pirongia-customizer.dat',
			'import_preview_image_url'     => 'https://s3.eu-central-1.amazonaws.com/live-demos/uku-pirongia-demoimg.jpg',
			'import_notice'            		=> __( 'You will need to install the WP Instagram Widget plugin before importing this demo!', 'uku' ),
		),

		array(
			'import_file_name'             => 'Demo Taupo',
			'categories'                   => array( 'Magazine' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demos/uku-taupo-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demos/uku-taupo-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demos/uku-taupo-customizer.dat',
			'import_preview_image_url'     => 'https://s3.eu-central-1.amazonaws.com/live-demos/uku-taupo-demoimg.jpg',
			'import_notice'            		=> __( 'You will need to install the WP Instagram Widget plugin before importing this demo!', 'uku' ),
		),

		array(
			'import_file_name'             => 'Demo Apia',
			'categories'                   => array( 'Blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demos/uku-apia-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demos/uku-apia-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demos/uku-apia-customizer.dat',
			'import_preview_image_url'     => 'https://s3.eu-central-1.amazonaws.com/live-demos/uku-apia-demoimg.jpg',
			'import_notice'            		=> __( 'You will need to install the WP Instagram Widget plugin before importing this demo!', 'uku' ),
		),

		array(
			'import_file_name'             => 'Demo Nadi',
			'categories'                   => array( 'Blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demos/uku-nadi-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demos/uku-nadi-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demos/uku-nadi-customizer.dat',
			'import_preview_image_url'     => 'https://s3.eu-central-1.amazonaws.com/live-demos/uku-nadi-demoimg.jpg',
			'import_notice'            		=> __( 'You will need to install the WP Instagram Widget plugin before importing this demo!', 'uku' ),
		),

		array(
			'import_file_name'             => 'Demo Tikioki',
			'categories'                   => array( 'Blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demos/uku-tikioki-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demos/uku-tikioki-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demos/uku-tikioki-customizer.dat',
			'import_preview_image_url'     => 'https://s3.eu-central-1.amazonaws.com/live-demos/uku-tikioki-demoimg.jpg',
			'import_notice'            		=> __( 'You will need to install the WP Instagram Widget plugin before importing this demo!', 'uku' ),
		),

	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

/*-----------------------------------------------------------------------------------*/
/* Disable branding for One Click Demo Import Plugin
/*-----------------------------------------------------------------------------------*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/*-----------------------------------------------------------------------------------*/
/* Set menus
/*-----------------------------------------------------------------------------------*/
function ocdi_after_import_setup() {
		// Assign menus to their locations.
		$primary = get_term_by( 'name', 'Main', 'nav_menu' );
		$social = get_term_by('name', 'Social', 'nav_menu');
		$social_front = get_term_by('name', 'Follow Us', 'nav_menu');
		$footer_one = get_term_by('name', 'About', 'nav_menu');
		$footer_two = get_term_by('name', 'Popular Categories', 'nav_menu');
		$footer_three = get_term_by('name', 'Follow Us', 'nav_menu');
		$footer_four = get_term_by('name', 'Secure Payment via', 'nav_menu');

		set_theme_mod( 'nav_menu_locations', array(
						'primary' => $primary->term_id,
						'social' => $social->term_id,
						'social-front' => $social_front->term_id,
						'footer-one' => $footer_one->term_id,
						'footer-two' => $footer_two->term_id,
						'footer-three' => $footer_three->term_id,
						'footer-four' => $footer_four->term_id,

				)
		);

		if ( 'Demo Ruapuke' === $selected_import['import_file_name'] ) {
			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Front Shop' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );
		}
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
