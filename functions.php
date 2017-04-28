<?php
/**
 * Asioi Seinäjoki functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Asioi_Seinäjoki
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function e_seinajoki_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Asioi Seinäjoki, use a find and replace
	 * to change 'e-seinajoki' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'e-seinajoki', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one locations.
	register_nav_menus( array(
		'social' => esc_html__( 'Social Links Menu', 'e-seinajoki' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'e_seinajoki_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'e_seinajoki_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function e_seinajoki_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'e_seinajoki_content_width', 780 );
}
add_action( 'after_setup_theme', 'e_seinajoki_content_width', 0 );

/**
 * Register custom fonts.
 */
function e_seinajoki_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Roboto Slab, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$pt_sans = _x( 'on', 'Roboto Slab font: on or off', 'e-seinajoki' );

	if ( 'off' !== $pt_sans ) {
		$font_families = array();

		$font_families[] = 'Roboto Slab:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 *
 * @param  array  $urls          URLs to print for resource hints.
 * @param  string $relation_type The relation type the URLs are printed.
 * @return array $urls          URLs to print for resource hints.
 */
function e_seinajoki_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'e-seinajoki-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'e_seinajoki_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function e_seinajoki_scripts() {
	// Get the minified suffix.
	$suffix = e_seinajoki_get_min_suffix();

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'e-seinajoki-fonts', e_seinajoki_fonts_url(), array(), null );

	// Add main styles.
	wp_enqueue_style( 'evervest-style', get_stylesheet_directory_uri() . '/style' . $suffix . '.css', array(), '20170427' );

	// Skip to content JS.
	wp_enqueue_script( 'e-seinajoki-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), '20161115', true );

	// Comment reply JS, not really needed at the moment.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'e_seinajoki_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * SVG icons.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Scripts and styles related functions.
 */
require get_template_directory() . '/inc/scripts-styles-functions.php';

/**
 * Metaboxes.
 */
require get_template_directory() . '/inc/metaboxes.php';
