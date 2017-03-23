<?php
/**
 * speculor functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package speculor
 */

// Create a helper function for easy SDK access.
function speculor_fs() {
	global $speculor_fs;

	if ( ! isset( $speculor_fs ) ) {
		// Include Freemius SDK.
		require_once dirname(__FILE__) . '/vendor/freemius/wordpress-sdk/start.php';

		$speculor_fs = fs_dynamic_init( array(
			'id'                  => '870',
			'slug'                => 'speculor',
			'type'                => 'theme',
			'public_key'          => 'pk_b6498a55e7b06c9e7427bae666aaa',
			'is_premium'          => false,
			'has_addons'          => false,
			'has_paid_plans'      => false,
		) );
	}

	return $speculor_fs;
}

// Init Freemius.
speculor_fs();
// Signal that SDK was initiated.
do_action( 'speculor_fs_loaded' );

if ( ! function_exists( 'speculor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function speculor_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on speculor, use a find and replace
	 * to change 'speculor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'speculor', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Add support for Theme Logo -> https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 35,
		'width'       => 165,
		'flex-width' => true,
	) );
	add_theme_support( 'custom-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-menu' => esc_html__( 'Main Menu', 'speculor' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'speculor_custom_background_args', array(
		'default-color' => 'eff1f3',
		'default-image' => '',
	) ) );

	// Add theme support for custom header.
	add_theme_support( 'custom-header', array('width' => 1920, 'height' => 600) );
}
endif;
add_action( 'after_setup_theme', 'speculor_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function speculor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'speculor_content_width', 650 );
}
add_action( 'after_setup_theme', 'speculor_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function speculor_scripts() {
	wp_enqueue_style( 'speculor-style', get_stylesheet_uri() );

	// Main JS fail
	wp_enqueue_script( 'speculor-main', get_template_directory_uri() . '/assets/js/main-min.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'speculor_scripts' );


/**
 * Google Fonts
 */
function speculor_google_fonts() {
	$query_args = array(
		'family' => 'Montserrat:400,700%7cLora:400,700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style( 'speculor_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	}
add_action('wp_enqueue_scripts', 'speculor_google_fonts');


/**
 * Require the files in the folder /inc/
 */
$speculor_files_to_require = array(
	'colors',
	'theme-customizer',
);

// Conditionally require the includes files, based if they exist in the child theme or not
foreach ( $speculor_files_to_require as $file ) {
	require_once trailingslashit( get_template_directory() ) . 'inc/' . $file . '.php';
}


/**
 * Added container around videos
 */
function speculor_custom_oembed_filter( $html ) {
	if (
		false !== strstr( $html, 'youtube.com' ) ||
		false !== strstr( $html, 'wordpress.tv' ) ||
		false !== strstr( $html, 'wordpress.com' ) ||
		false !== strstr( $html, 'vimeo.com' )
	) {
		$out = '<div class="embed-responsive  embed-responsive-16by9">' . $html . '</div>';
	} else {
		$out = $html;
	}
	return $out;
}
add_filter( 'embed_oembed_html', 'speculor_custom_oembed_filter', 10, 4 ) ;


/**
 * Added container around SoundCloud
 */
function speculor_custom_oembed_filter_soundcloud( $html_soundcloud ) {
	if (
		false !== strstr( $html_soundcloud, 'soundcloud.com' )
	) {
		$out = '<div class="embed-responsive  embed-responsive-13by8">' . $html_soundcloud . '</div>';
	} else {
		$out = $html_soundcloud;
	}
	return $out;
}
add_filter( 'embed_oembed_html', 'speculor_custom_oembed_filter_soundcloud', 10, 4 ) ;


/**
 * Replaces the excerpt "more" text
 */
function speculor_new_excerpt_more($more) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'speculor_new_excerpt_more' );


/**
 * Remove hentry fomr post_class
 */
function speculor_remove_post_class( $classes ) {
	if( ( $key = array_search( 'hentry', $classes ) ) !== false )
		unset( $classes[$key] );
	return $classes;
}
add_filter( 'post_class', 'speculor_remove_post_class' );


/**
 * Custom tag font size.
 */
function speculor_set_tag_cloud_sizes( $args ) {
	$args['smallest'] = 10;
	$args['largest']  = 10;
	$args['unit'] = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'speculor_set_tag_cloud_sizes' );


/**
 * Register theme sidebars
 */
function speculor_sidebars() {
	// Blog Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'speculor' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Sidebar on the blog.', 'speculor' ),
			'class'         => 'sidebar',
			'before_widget' => '<div class="widget  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sidebar__heading">',
			'after_title'   => '</h2>',
		)
	);

	// Regular Page Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Regular Page Sidebar', 'speculor' ),
			'id'            => 'regular-page-sidebar',
			'description'   => esc_html__( 'Sidebar on the regular page.', 'speculor' ),
			'class'         => 'sidebar',
			'before_widget' => '<div class="widget  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sidebar__heading">',
			'after_title'   => '</h2>',
		)
	);

	// Header Left Widgets.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Left', 'speculor' ),
			'id'            => 'header-widgets-left',
			'description'   => esc_html__( 'Place for widgets on left side of header.', 'speculor' ),
			'before_widget' => '<div class="widget  %2$s">',
			'after_widget'  => '</div>',
		)
	);

	// Header Right Widgets.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Right', 'speculor' ),
			'id'            => 'header-widgets-right',
			'description'   => esc_html__( 'Place for widgets on right side of header.', 'speculor' ),
			'before_widget' => '<div class="widget  %2$s">',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'speculor_sidebars' );
