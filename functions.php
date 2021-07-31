<?php
/**
 * Uku functions and definitions
 *
 * @package Uku
 * @since Uku 1.0
 * @version 1.1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Theme update feature setup
/*-----------------------------------------------------------------------------------*/

if ( ! class_exists( 'WC_AM_Client_25' ) ) {
	require_once( get_template_directory() . '/inc/wc-am-client.php' );
}

if ( class_exists( 'WC_AM_Client_25' ) ) {

	$wcam_lib = new WC_AM_Client_25( __FILE__, '', wp_get_theme( wp_get_theme()->Template )->Version, 'theme', 'https://www.elmastudio.de/', wp_get_theme( wp_get_theme()->Template )->Name, wp_get_theme( wp_get_theme()->Template )->get( 'TextDomain' ), '215055' );

}

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/
function uku_setup() {

	// Make Uku available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'uku', get_template_directory() . '/languages' );

	// Remove support form block widget screens.
	remove_theme_support( 'widgets-block-editor' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for wider content.
	add_theme_support( 'align-wide' );

	// Add support for editor font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'uku' ),
			'shortName' => __( 'S', 'uku' ),
			'size' => 16,
			'slug' => 'small'
		),
		array(
			'name' => __( 'regular', 'uku' ),
			'shortName' => __( 'M', 'uku' ),
			'size' => 19,
			'slug' => 'regular'
		),
		array(
			'name' => __( 'large', 'uku' ),
			'shortName' => __( 'L', 'uku' ),
			'size' => 22,
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'uku' ),
			'shortName' => __( 'XL', 'uku' ),
			'size' => 26,
			'slug' => 'larger'
		)
	) );

	// Disable custom editor font sizes.
	add_theme_support('disable-custom-font-sizes');

	// Adds support for editor color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'dark', 'uku' ),
			'slug'  => 'dark',
			'color' => '#1a1a1a',
		 ),
	 array(
		 'name'  => __( 'white', 'uku' ),
		 'slug'  => 'white',
		 'color' => '#ffffff',
		),
		array(
			'name'  => __( 'light grey', 'uku' ),
			'slug'  => 'light-grey',
			'color' => '#f4f4f4',
		),
		array(
			'name'  => __( 'light blue', 'uku' ),
			'slug'  => 'light-blue',
			'color'	=> '#51a8dd',
		),
		array(
			'name'  => __( 'dark blue', 'uku' ),
			'slug'  => 'dark-blue',
			'color' => '#0c6ca6',
		),
	 ) );

	// This theme styles the visual editor to resemble the theme style.
	if ( 'neo' == get_theme_mod( 'uku_main_design' ) ) {
		add_editor_style( array( 'assets/css/editor-style-neo.css', uku_fonts_url() ) );
	}
	elseif ( 'serif' == get_theme_mod( 'uku_main_design' ) ) {
		add_editor_style( array( 'assets/css/editor-style-serif.css', uku_fonts_url() ) );
	}
	else {
		add_editor_style( array( 'assets/css/editor-style.css', uku_fonts_url() ) );
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary'				=> esc_html__( 'Main menu', 'uku' ),
		'social' 				=> esc_html__( 'Social Icons', 'uku' ),
		'social-front' 	=> esc_html__( 'Social menu', 'uku' ),
		'footer-one' 		=> esc_html__( 'Footer 1', 'uku' ),
		'footer-two' 		=> esc_html__( 'Footer 2', 'uku' ),
		'footer-three' 	=> esc_html__( 'Footer 3', 'uku' ),
		'footer-four' 	=> esc_html__( 'Footer 4', 'uku' ),
	) );

	// Switch default core markup to output valid HTML5.
	add_theme_support( 'html5', array(
		'gallery',
		'caption',
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'uku_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// Enable support for Video Post Formats.
	add_theme_support( 'post-formats', array (
		'video',
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 520,
		'height'      => 236,
	) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );

	//  Adding several sizes for Post Thumbnails
	add_image_size( 'uku-standard-blog', 1024, 576, true );
	add_image_size( 'uku-featured', 1440, 530, true );
	add_image_size( 'uku-featured-big', 1440, 690, true );
	add_image_size( 'uku-bigthumb', 1440, 580, true );
	add_image_size( 'uku-front-big', 1260, 709, true );
	add_image_size( 'uku-front-small', 800, 450, true );
	add_image_size( 'uku-neo-big', 1500, 680, true );
	add_image_size( 'uku-serif-big', 1500, 690);
	add_image_size( 'uku-neo-blog', 1024, 768, true );
	add_image_size( 'uku-neo-featuredbottom', 880, 932, true );
	add_image_size( 'uku-serif-small', 790, 593, true );

}
add_action( 'after_setup_theme', 'uku_setup' );

/*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

function uku_content_width() {
	if ( is_page_template('full-width.php') ) {
		$GLOBALS['content_width'] = 1500;
	}
}
add_action( 'template_redirect', 'uku_content_width' );

/*-----------------------------------------------------------------------------------*/
/* Register Google fonts for Uku.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'uku_fonts_url' ) ) :

function uku_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Noticia Text, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Noticia Text font: on or off', 'uku' ) && 'standard' == get_theme_mod( 'uku_main_design' ) || '' == get_theme_mod( 'uku_main_design' ) ) {
		$fonts[] = 'Noticia Text:400,400italic,700,700italic';
	}

	/* translators: If there are characters in your language that are not supported by Kanit, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Kanit font: on or off', 'uku' ) && 'standard' == get_theme_mod( 'uku_main_design' ) || '' == get_theme_mod( 'uku_main_design' )) {
		$fonts[] = 'Kanit:400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Source Serif Pro, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Source Serif Pro font: on or off', 'uku' ) && 'neo' == get_theme_mod( 'uku_main_design' ) ) {
		$fonts[] = 'Source Serif Pro:400,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Poppins font: on or off', 'uku' ) && 'neo' == get_theme_mod( 'uku_main_design') || 'serif' == get_theme_mod( 'uku_main_design' ) ) {
		$fonts[] = 'Poppins:400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Cormorant Garamond, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Cormorant Garamond font: on or off', 'uku' ) && 'serif' == get_theme_mod( 'uku_main_design' ) ) {
		$fonts[] = 'Cormorant Garamond:400,500,700,400i,700i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

 /*-----------------------------------------------------------------------------------*/
 /*  JavaScript detection.
 /*  Adds a `js` class to the root `<html>` element when JavaScript is detected.
 /*-----------------------------------------------------------------------------------*/
function uku_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'uku_javascript_detection', 0 );

/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/
function uku_scripts() {
	global $wp_styles;

	// Add fonts, used in the main stylesheet.
	wp_enqueue_style( 'uku-fonts', uku_fonts_url(), array(), null );

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Loads stylesheets.
	wp_enqueue_style( 'uku-style', get_stylesheet_uri(), array(), '20160507' );

	if ( 'neo' == get_theme_mod( 'uku_main_design' ) ) {
		wp_enqueue_style( 'uku-neo-style', get_template_directory_uri(). '/assets/css/neo-style.css' , array(), '1.0' );
	}

	if ( 'serif' == get_theme_mod( 'uku_main_design' ) ) {
		wp_enqueue_style( 'uku-serif-style', get_template_directory_uri(). '/assets/css/serif-style.css' , array(), '1.0' );
	}

	// Loads Custom Uku JavaScript functionality
	wp_enqueue_script( 'uku-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20160507', true );
	wp_localize_script( 'uku-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'uku' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'uku' ) . '</span>',
	) );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/fonts/genericons.css', array(), '3.4.1' );

	// Loads Scripts for Featured Post Slider
	if ( '' != get_theme_mod( 'uku_featuredtag' ) ) {
		wp_enqueue_style( 'uku-slick-style', get_template_directory_uri() . '/assets/js/slick/slick.css' );
		wp_enqueue_script( 'uku-slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ) );
	}

	// Loading viewpoint checker script
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/assets/js/jquery.viewportchecker.min.js', array( 'jquery' ), '1.8.7' );

	// Loads Scripts Sticky Sidebar Element
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/assets/js/sticky-kit.min.js', array( 'jquery' ) );

	// Loading FitVids responsive Video script
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array( 'jquery' ), '1.1' );

}
add_action( 'wp_enqueue_scripts', 'uku_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function uku_block_editor_styles() {
 wp_enqueue_style( 'uku-block-editor-styles', get_template_directory_uri() . '/block-editor.css');
 wp_enqueue_style( 'uku-fonts', uku_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'uku_block_editor_styles' );

/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
function uku_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'uku_page_menu_args' );

/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/
function uku_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'uku_setup_author' );

/*-----------------------------------------------------------------------------------*/
/* Add title to custom menu
/*-----------------------------------------------------------------------------------*/
function uku_get_menu_by_location( $location ) {
		if( empty($location) ) return false;

		$locations = get_nav_menu_locations();
		if( ! isset( $locations[$location] ) ) return false;

		$menu_obj = get_term( $locations[$location], 'nav_menu' );

		return $menu_obj;
}

/*-----------------------------------------------------------------------------------*/
/* Add custom max excerpt lengths.
/*-----------------------------------------------------------------------------------*/
function uku_custom_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'uku_custom_excerpt_length', 999 );

/*-----------------------------------------------------------------------------------*/
/* Replace "[...]" with custom read more in excerpts.
/*-----------------------------------------------------------------------------------*/
function uku_excerpt_more( $more ) {
	global $post;
	return '&hellip;';
}
add_filter( 'excerpt_more', 'uku_excerpt_more' );

/*-----------------------------------------------------------------------------------*/
/* Featured Slider Function
/*-----------------------------------------------------------------------------------*/
function uku_has_featured_posts( $minimum = 1 ) {
		if ( is_paged() )
				return false;

		$minimum = absint( $minimum );
		$featured_posts = apply_filters( 'uku_get_featured_posts', array() );

		if ( ! is_array( $featured_posts ) )
				return false;

		if ( $minimum > count( $featured_posts ) )
				return false;

		return true;
}

/*-----------------------------------------------------------------------------------*/
/* Add Twitter Username to User Profile
/*-----------------------------------------------------------------------------------*/
function add_twitter_contactmethod( $contactmethods ) {
	// Add Twitter
	if ( !isset( $contactmethods['twitter'] ) )
		$contactmethods['twitter'] = 'Twitter Name';

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_twitter_contactmethod', 10, 1 );

/*-----------------------------------------------------------------------------------*/
/* Customize Jetpack Related Posts
/*-----------------------------------------------------------------------------------*/
function jetpackme_more_related_posts( $options ) {
		$options['size'] = 4;
		return $options;
}
add_filter( 'jetpack_relatedposts_filter_options', 'jetpackme_more_related_posts' );

/*-----------------------------------------------------------------------------------*/
/* Remove Related Posts in defalut position (added via shortcode to the single.php)
/*-----------------------------------------------------------------------------------*/
function jetpackme_remove_rp() {
		if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
				$jprp = Jetpack_RelatedPosts::init();
				$callback = array( $jprp, 'filter_add_target_to_dom' );
				remove_filter( 'the_content', $callback, 40 );
		}
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

/*-----------------------------------------------------------------------------------*/
/* Remove Sharing Icons position (added via shortcode to the single.php)
/*-----------------------------------------------------------------------------------*/
function jptweak_remove_share() {
		remove_filter( 'the_content', 'sharing_display',19 );
		remove_filter( 'the_excerpt', 'sharing_display',19 );
		if ( class_exists( 'Jetpack_Likes' ) ) {
				remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
		}
}

add_action( 'loop_start', 'jptweak_remove_share' );

/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/
function uku_customize_css() {
		?>
	<style type="text/css">
		<?php if ('' != get_theme_mod( 'uku_titleuppercase' ) ) { ?>
			#site-branding h1.site-title, #site-branding p.site-title, .sticky-header p.site-title {text-transform: uppercase; letter-spacing: 5px;}
		<?php } ?>
		<?php if ('#51a8dd' != get_theme_mod( 'uku_link_color' ) ) { ?>
			.entry-content a,
			.comment-text a,
			#desktop-navigation ul li a:hover,
			.featured-slider button.slick-arrow:hover::after,
			.front-section a.all-posts-link:hover,
			#overlay-close:hover,
			.widget-area .widget ul li a:hover,
			#sidebar-offcanvas .widget a:hover,
			.textwidget a:hover,
			#overlay-nav a:hover,
			.author-links a:hover,
			.single-post .post-navigation a:hover,
			.single-attachment .post-navigation a:hover,
			.author-bio a,
			.single-post .hentry .entry-meta a:hover,
			.entry-header a:hover,
			.entry-header h2.entry-title a:hover,
			.blog .entry-meta a:hover,
			.uku-neo .entry-content p a:hover,
			.uku-neo .author-bio a:hover,
			.uku-neo .comment-text a:hover,
			.uku-neo .entry-header h2.entry-title a:hover,
			.uku-serif .entry-header h2.entry-title a:hover,
			.uku-serif .entry-content p a,
			.uku-serif .entry-content li a,
			.uku-serif .author-bio a,
			.uku-serif .comment-text a {
				color: <?php echo get_theme_mod('uku_link_color'); ?>;
			}
			.uku-serif .entry-content p a,
			.uku-serif .entry-content li a,
			.uku-serif .author-bio a,
			.uku-serif .comment-text a {
				box-shadow: inset 0 -1px 0 <?php echo get_theme_mod('uku_link_color'); ?>;
			}
			.single-post .post-navigation a:hover,
			.single-attachment .post-navigation a:hover,
			#desktop-navigation ul li.menu-item-has-children a:hover::after,
			.desktop-search input.search-field:active,
			.desktop-search input.search-field:focus {
				border-color: <?php echo get_theme_mod('uku_link_color'); ?>;
			}
			.featured-slider .entry-cats a,
			.section-one-column-one .entry-cats a,
			.section-three-column-one .entry-cats a,
			#front-section-four .entry-cats a,
			.single-post .entry-cats a,
			.blog.uku-standard.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n) .entry-cats a,
			#desktop-navigation .sub-menu li a:hover,
			#desktop-navigation .children li a:hover,
			.widget_mc4wp_form_widget input[type="submit"],
			.uku-neo .featured-slider .entry-cats a:hover,
			.uku-neo .section-one-column-one .entry-cats a:hover,
			.uku-neo .section-three-column-one .entry-cats a:hover,
			.uku-neo #front-section-four .entry-cats a:hover,
			.uku-neo .single-post .entry-cats a:hover,
			.uku-neo .format-video .entry-thumbnail span.video-icon:before,
			.uku-neo .format-video .entry-thumbnail span.video-icon:after,
			.uku-neo .entry-content p a:hover::after,
			.uku-neo .author-bio a:hover::after,
			.uku-neo .comment-text a:hover::after {
				background: <?php echo get_theme_mod('uku_link_color'); ?>;
			}
			.blog.blog-classic #primary .hentry.has-post-thumbnail:nth-child(4n) .entry-cats a {
				background: none !important;
			}
			@media screen and (min-width: 66.25em) {
				.uku-neo #overlay-open:hover,
				.uku-neo .search-open:hover,
				.uku-neo #overlay-open-sticky:hover,
				.uku-neo.fixedheader-dark.header-stick #overlay-open-sticky:hover,
				.uku-neo.fixedheader-dark.header-stick #search-open-sticky:hover {
					background: <?php echo get_theme_mod('uku_link_color'); ?>;
				}
			}
		<?php } ?>
		<?php if ('#0c6ca6' != get_theme_mod( 'uku_linkhover_color' ) ) { ?>
			.entry-content a:hover,
			.comment-text a:hover,
			.author-bio a:hover {
				color: <?php echo get_theme_mod('uku_linkhover_color'); ?> !important;
			}
			.blog.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n) .entry-cats a:hover,
			.featured-slider .entry-cats a:hover,
			.section-one-column-one .entry-cats a:hover,
			.section-three-column-one .entry-cats a:hover,
			#front-section-four .entry-cats a:hover,
			.single-post .entry-cats a:hover,
			#colophon .footer-feature-btn:hover,
			.comments-show #comments-toggle,
			.widget_mc4wp_form_widget input[type="submit"]:hover,
			#comments-toggle:hover,
			input[type="submit"]:hover,
			input#submit:hover,
			#primary #infinite-handle span:hover,
			#front-section-three a.all-posts-link:hover,
			.desktop-search input[type="submit"]:hover,
			.widget_search input[type="submit"]:hover,
			.post-password-form input[type="submit"]:hover,
			#offcanvas-widgets-open:hover,
			.offcanvas-widgets-show #offcanvas-widgets-open,
			.uku-standard.blog-classic .entry-content p a.more-link:hover {
				background: <?php echo get_theme_mod('uku_linkhover_color'); ?>;
			}
			#colophon .footer-feature-textwrap .footer-feature-btn:hover,
			.comments-show #comments-toggle,
			#comments-toggle:hover,
			input[type="submit"]:hover,
			input#submit:hover,
			.blog #primary #infinite-handle span:hover,
			#front-section-three a.all-posts-link:hover,
			.desktop-search input[type="submit"]:hover,
			.widget_search input[type="submit"]:hover,
			.post-password-form input[type="submit"]:hover,
			#offcanvas-widgets-open:hover,
			.offcanvas-widgets-show #offcanvas-widgets-open,
			.uku-standard.blog-classic .entry-content p a.more-link:hover {
				border-color: <?php echo get_theme_mod('uku_linkhover_color'); ?> !important;
			}
		<?php } ?>
		<?php if ('#1a1a1a' != get_theme_mod( 'uku_footer_bg_color' ) ) { ?>
			#colophon,
			.uku-serif .big-instagram-wrap {background: <?php echo get_theme_mod('uku_footer_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#ffffff' != get_theme_mod( 'uku_footer_text_color' ) ) { ?>
		#colophon,
		#colophon .footer-menu ul a,
		#colophon .footer-menu ul a:hover,
		#colophon #site-info, #colophon #site-info a,
		#colophon #site-info, #colophon #site-info a:hover,
		#footer-social span,
		#colophon .social-nav ul li a,
		.uku-serif .big-instagram-wrap .null-instagram-feed .clear a,
		.uku-serif .big-instagram-wrap .widget h2.widget-title {
			color: <?php echo get_theme_mod('uku_footer_text_color'); ?>;
		}
		.footer-menus-wrap {
			border-bottom: 1px solid <?php echo get_theme_mod('uku_footer_text_color'); ?>;
		}
		<?php } ?>
		<?php if ('#f4f4f4' != get_theme_mod( 'uku_offcanvas_bg_color' ) ) { ?>
			.mobile-search, .inner-offcanvas-wrap {background: <?php echo get_theme_mod('uku_offcanvas_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#2b2b2b' != get_theme_mod( 'uku_offcanvas_text_color' ) ) { ?>
			#mobile-social ul li a,
			#overlay-nav ul li a,
			#offcanvas-widgets-open,
			.dropdown-toggle,
			#sidebar-offcanvas .widget h2.widget-title,
			#sidebar-offcanvas .widget,
			#sidebar-offcanvas .widget a {
				color: <?php echo get_theme_mod('uku_offcanvas_text_color'); ?>;
			}
			#sidebar-offcanvas .widget h2.widget-title {border-color: <?php echo get_theme_mod('uku_offcanvas_text_color'); ?>;}
			#offcanvas-widgets-open {border-color: <?php echo get_theme_mod('uku_offcanvas_text_color'); ?>;}
			@media screen and (min-width: 66.25em) {
			#overlay-nav ul li,
			#overlay-nav ul ul.sub-menu,
			#overlay-nav ul ul.children {border-color: <?php echo get_theme_mod('uku_offcanvas_text_color'); ?>;}
			#overlay-close {color: <?php echo get_theme_mod('uku_offcanvas_text_color'); ?>;}
			#overlay-nav {
				border-color: <?php echo get_theme_mod('uku_offcanvas_text_color'); ?>;
			}
			}
		<?php } ?>
		<?php if ('#f4f4f4' != get_theme_mod( 'uku_frontsection_bg_color' ) ) { ?>
			#front-section-three {background: <?php echo get_theme_mod('uku_frontsection_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#f4f4f4' != get_theme_mod( 'uku_subscribe_bg_color' ) ) { ?>
			.widget_mc4wp_form_widget, .jetpack_subscription_widget {background: <?php echo get_theme_mod('uku_subscribe_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#ffefef' != get_theme_mod( 'uku_aboutsection_bg_color' ) ) { ?>
			.uku-serif .front-about-img:after {background: <?php echo get_theme_mod('uku_aboutsection_bg_color'); ?>;}
		<?php } ?>
		<?php if ('#f2f2ee' != get_theme_mod( 'uku_shopcats_bg_color' ) ) { ?>
			#shopfront-cats {background: <?php echo get_theme_mod('uku_shopcats_bg_color'); ?>;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_section_twocolumn_excerpt') ) { ?>
			#front-section-twocolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_section_threecolumn_excerpt' ) ) { ?>
			#front-section-threecolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_section_fourcolumn_excerpt' ) ) { ?>
			#front-section-fourcolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_section_sixcolumn_excerpt' ) ) { ?>
			#front-section-sixcolumn .entry-summary {display: block;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_hidedate' ) ) { ?>
			.blog .entry-date {display: none !important;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_hidecomments' ) ) { ?>
			.blog .entry-comments {display: none !important;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_hidecats' ) ) { ?>
			.blog .entry-cats {display: none !important;}
		<?php } ?>
		<?php if ('' != get_theme_mod( 'uku_front_hideauthor' ) ) { ?>
			.entry-author, .entry-date:before {display: none !important;}
		<?php } ?>
		<?php if ('#000000' != get_theme_mod( 'uku_imgoverlay_color' ) ) { ?>
			.blog.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n) .entry-thumbnail a:after,
			.featured-slider .entry-thumbnail a:after,
			.uku-serif .featured-slider .entry-thumbnail:after,
			.header-image:after,
			#front-section-four .entry-thumbnail a:after,
			.uku-serif #front-section-four .entry-thumbnail a .thumb-wrap:after,
			.single-post .big-thumb .entry-thumbnail a:after,
			.blog.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n) .thumb-wrap:after,
			.section-two-column-one .thumb-wrap:after,
			.header-fullscreen #headerimg-wrap:after {background-color: <?php echo get_theme_mod('uku_imgoverlay_color'); ?>;}
		<?php } ?>
		<?php if ('0' != get_theme_mod( 'uku_imgoverlay_transparency' ) ) { ?>
			.blog.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n) .entry-thumbnail a:after,
			.blog.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n) .thumb-wrap:after,
			.section-two-column-one .thumb-wrap:after,
			.featured-slider .entry-thumbnail a:after,
			.uku-serif .featured-slider .entry-thumbnail:after,
			.header-image:after,
			.uku-serif .section-two-column-one .entry-thumbnail a:after,
			#front-section-four .entry-thumbnail a:after,
			.uku-serif #front-section-four .entry-thumbnail a .thumb-wrap:after,
			.single-post .big-thumb .entry-thumbnail a:after,
			.header-fullscreen #headerimg-wrap:after {opacity: <?php echo get_theme_mod('uku_imgoverlay_transparency'); ?>;}
		<?php } ?>
		<?php if ('0' == get_theme_mod( 'uku_imgoverlay_transparency' ) ) { ?>
			.header-fullscreen #headerimg-wrap:after {	background-color: transparent;}
		<?php } ?>
		<?php if ('0.7' != get_theme_mod( 'uku_imggradient' ) ) { ?>
			#front-section-four .meta-main-wrap,
			.featured-slider .meta-main-wrap,
			.blog.blog-defaultplus #primary .hentry.has-post-thumbnail:nth-child(4n) .meta-main-wrap,
			.uku-serif .section-two-column-one .entry-text-wrap,
			.big-thumb .title-wrap {
				background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,<?php echo get_theme_mod('uku_imggradient'); ?>) 100%);
				background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,<?php echo get_theme_mod('uku_imggradient'); ?>) 100%);
				background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,<?php echo get_theme_mod('uku_imggradient'); ?>) 100%);
			}
			<?php } ?>

			<?php if ('' != get_theme_mod( 'uku_custom_css' ) ) { ?>
				<?php echo get_theme_mod('uku_custom_css'); ?>
			<?php } ?>
	</style>
		<?php
}
add_action( 'wp_head', 'uku_customize_css');

/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/
add_filter('use_default_gallery_style', '__return_false');


/**
 * Callback to change just html output on a comment.
 */
function uku_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 140 ); ?>
			</div>

			<div class="comment-wrap">
				<div class="comment-details">
					<div class="comment-author">

						<?php printf( ( '%s' ), wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>
					</div><!-- end .comment-author -->
					<div class="comment-meta">
						<span class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
							/* translators: 1: date */
								printf( esc_html__( '%1$s', 'uku' ),
								get_comment_date());
							?></a>
						</span>
						<?php edit_comment_link( esc_html__(' Edit', 'uku'), '<span class="comment-edit">', '</span>'); ?>
					</div><!-- end .comment-meta -->
				</div><!-- end .comment-details -->

				<div class="comment-text">
				<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'uku' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->
				<?php if ( comments_open () ) : ?>
					<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'uku' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
				<?php endif; ?>
			</div><!-- end .comment-wrap -->
		</div><!-- end .comment -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/
function uku_widgets_init() {

	register_sidebar( array (
		'name'          => esc_html__( 'Blog Sidebar', 'uku' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets appear in the default sidebar.', 'uku' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array (
		'name'          => esc_html__( 'Page Sidebar', 'uku' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets appear in the sidebar on pages.', 'uku' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array (
		'name'          => esc_html__( 'Off Canvas Widget Area', 'uku' ),
		'id'            => 'sidebar-offcanvas',
		'description'   => esc_html__( 'Widgets appear in the off canvas area.', 'uku' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array (
		'name'          => esc_html__( 'Big Footer Instagram Widget Area', 'uku' ),
		'id'            => 'sidebar-instagram',
		'description'   => esc_html__( 'Widget area to show the WP Instagram Widget in a big one-column footer area .', 'uku' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( 'serif' == get_theme_mod( 'uku_main_design' ) ) {
		register_sidebar( array (
			'name'          => esc_html__( 'Big Footer Mailchimp Widget Area', 'uku' ),
			'id'            => 'sidebar-newsletter',
			'description'   => esc_html__( 'Widget area to show the Mailchimp Newsletter Widget in a big one-column footer area .', 'uku' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => "</section>",
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

}
add_action( 'widgets_init', 'uku_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

 /*-----------------------------------------------------------------------------------*/
 /* Additional features to allow styling of the templates.
 /*-----------------------------------------------------------------------------------*/
require get_parent_theme_file_path( '/inc/template-functions.php' );

/*-----------------------------------------------------------------------------------*/
/* Custom template tags for this theme.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/template-tags.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the Uku Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );

/*-----------------------------------------------------------------------------------*/
/* Load Jetpack compatibility file.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Add WooCommerce code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/woocommerce/woocommerce.php';

/*-----------------------------------------------------------------------------------*/
/* Add DemoInstaller code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/demo-installer.php';
