<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class gdrts_core_demo_trend {
	public function __construct() {
		/* Register new template storage path */
		add_filter( 'gdrts_default_templates_storage_paths', array( $this, 'templates' ) );

		/* Register new thumbs styling themes */
		add_filter( 'gdrts_list_thumbs_style_theme', array( $this, 'thumbs_themes' ) );

		/* Register new thumbs font */
		add_action( 'gdrts_register_icons_fonts', array( $this, 'register' ) );

		/* Load the replacement render class */
		add_action( 'gdrts_single_render_pre_process', array( $this, 'render' ) );

		/* Register demo plugin JavaScript */
		add_action( 'gdrts_register_enqueue_files', array( $this, 'register_enqueue_files' ), 10, 4 );

		/* Enqueue demo plugin JavaScript */
		add_action( 'gdrts_enqueue_core_files', array( $this, 'enqueue_core_files' ), 10, 2 );
	}

	public function templates( $paths ) {
		array_unshift( $paths, GDRTS_DT_PATH . 'templates/' );

		return $paths;
	}

	public function thumbs_themes( $themes ) {
		$themes['trend']           = 'Trends Article';
		$themes['trend-comment']   = 'Trends Comment';
		$themes['trend-in-widget'] = 'Trends in Widget';

		return $themes;
	}

	public function register() {
		require_once( GDRTS_DT_PATH . 'core/font.php' );

		gdrts_register_font( 'gdrts-trend', new gdrts_font_trend() );
	}

	public function render() {
		require_once( GDRTS_DT_PATH . 'core/render.php' );
	}

	public function register_enqueue_files( $load_js, $load_css, $js, $css ) {
		wp_register_script( 'gdrts-demo-trend', GDRTS_DT_URL . 'js/trend.js', array( 'gdrts-events' ) );
	}

	public function enqueue_core_files( $load_js, $load_css ) {
		wp_enqueue_script( 'gdrts-demo-trend' );
	}
}

new gdrts_core_demo_trend();
