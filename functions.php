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
		add_action( 'customize_register', array( $this, 'customizer_updates' ) );
		add_action( 'widgets_init', array( $this, 'add_widget_areas' ) );

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
		$fa_ver       = '4.7.0';
		$fa_url       = "//maxcdn.bootstrapcdn.com/font-awesome/$fa_ver/css/font-awesome.min.css";
		$main_js_url  = $theme_url . '/js/main.min.js';
		$main_js_path = get_template_directory() . '/js/main.min.js';
		$main_js_ver  = file_exists( $main_js_path ) ? filemtime( $main_js_path ) : '';

		wp_enqueue_style( 'fa-style', $fa_url, null, $fa_ver );
		wp_enqueue_script( 'superiocity-script', $main_js_url, null, $main_js_ver, true );
	}


	/**
	 * Update the theme customizer.
	 *
	 * @param \WP_Customize_Manager $customizer The WP customize manager object.
	 */
	public function customizer_updates( \WP_Customize_Manager $customizer ) {

		// Custom logo.
		$customizer->add_setting(
			'super_logo',
			array( 'sanitize_callback' => 'absint' )
		);

		$customizer->add_control(
			new \WP_Customize_Media_Control(
				$customizer,
				'super_logo',
				array(
					'section'   => 'title_tagline',
					'label'     => __( 'Logo', 'superiocity' ),
					'mime_type' => 'image',
				)
			)
		);

		// Custom call to action.
		$customizer->add_setting( 'super_call_to_action' );

		$customizer->add_control(
			'super_call_to_action',
			array(
				'label'   => 'Call to action',
				'section' => 'title_tagline',
				'type'    => 'textarea'
				)
		);
	}


	/**
	 * Add widget areas.
	 */
	public function add_widget_areas() {

		register_sidebar( array(
			'name'          => 'Header bar',
			'id'            => 'header_bar',
			'before_widget' => '',
			'after_widget'  => '',
		) );

		register_sidebar( array(
			'name'          => 'Footer',
			'id'            => 'footer',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		) );

		register_sidebar( array(
			'name'          => 'Copyright line',
			'id'            => 'copyright',
			'before_widget' => '<span class="sep">|</span>',
			'after_widget'  => '',
		) );
	}
}
