<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'superiocity_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function superiocity_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'superiocity' ),
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
	}

	superiocity_setup();

endif;


/**
 * Enqueue scripts and styles.
 */
function superiocity_scripts_styles() {
	if ( is_admin() ) {
		return;
	}

	$themeUrl    = get_template_directory_uri();
	$mainCssUrl  = $themeUrl . '/style.css';
	$mainCssPath = get_template_directory() . '/style.css';
	$mainCssVer  = file_exists( $mainCssPath ) ? filemtime( $mainCssPath ) : '';

	wp_enqueue_style( 'superiocity-style', $mainCssUrl, null, $mainCssVer );
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_enqueue_scripts', 'superiocity_scripts_styles' );


function superiocity_scripts_styles_footer() {
	if ( is_admin() ) {
		return;
	}

	$themeUrl    = get_template_directory_uri();
	$faVer       = '4.5.0';
	$faUrl       = "//maxcdn.bootstrapcdn.com/font-awesome/$faVer/css/font-awesome.min.css";
	$gFontUrl    = '//fonts.googleapis.com/css?family=Quattrocento+Sans:400,700,700italic,400italic|Quicksand:300';
	$mainJsUrl   = $themeUrl . '/js/main.min.js';
	$mainJsPath  = get_template_directory() . '/js/main.min.js';
	$mainJsVer   = file_exists( $mainJsPath ) ? filemtime( $mainJsPath ) : '';

	wp_enqueue_style( 'fa-style', $faUrl, null, $faVer );
	wp_enqueue_style( 'gfont', $gFontUrl );
	wp_enqueue_script( 'superiocity-script', $mainJsUrl, null, $mainJsVer, true );
}

add_action( 'get_footer', 'superiocity_scripts_styles_footer' );


/**
 * Hide the admin bar for all users
 */
add_filter( 'show_admin_bar', '__return_false' );


