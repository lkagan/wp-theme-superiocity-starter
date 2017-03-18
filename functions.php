<?php
/**
 * Theme setup file for the Superiocity Starter theme.
 *
 * @package Superiocity
 */

declare( strict_types = 1 );
namespace Superiocity;
new Theme_Setup();


/**
 * General setup
 */
class Theme_Setup {

	/**
	 * Theme constructor.
	 */
	public function __construct() {

		$this->add_features();
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_styles' ) );
		add_action( 'get_footer', array( $this, 'scripts_styles_footer' ) );
	}


	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	protected function add_features() {

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'superiocity' ),
		) );

		add_theme_support( 'title-tag' );

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


	/**
	 * Enqueue scripts and styles.
	 */
	function scripts_styles() {

		// No need to process if in admin.
		if ( is_admin() ) {
			return;
		}

		$theme_url     = get_template_directory_uri();
		$main_css_url  = $theme_url . '/style.css';
		$main_css_path = get_template_directory() . '/style.css';
		$main_css_ver  = file_exists( $main_css_path ) ? filemtime( $main_css_path ) : '';

		wp_enqueue_style( 'superiocity-style', $main_css_url, null, $main_css_ver );
		wp_deregister_script( 'wp-embed' );
	}


	/**
	 * Adds scripts and styles to the footer of the pages.
	 */
	public function scripts_styles_footer() {
		if ( is_admin() ) {
			return;
		}

		$theme_url    = get_template_directory_uri();
		$fa_ver       = '4.5.0';
		$fa_url       = "//maxcdn.bootstrapcdn.com/font-awesome/$fa_ver/css/font-awesome.min.css";
		$g_font_url   = '//fonts.googleapis.com/css?family=Quattrocento+Sans:400,700,700italic,400italic|Quicksand:300';
		$main_js_url  = $theme_url . '/js/main.min.js';
		$main_js_path = get_template_directory() . '/js/main.min.js';
		$main_js_ver  = file_exists( $main_js_path ) ? filemtime( $main_js_path ) : '';

		wp_enqueue_style( 'fa-style', $fa_url, null, $fa_ver );
		wp_enqueue_style( 'gfont', $g_font_url );
		wp_enqueue_script( 'superiocity-script', $main_js_url, null, $main_js_ver, true );
	}
}
