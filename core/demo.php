<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class gdrts_core_demo_trend {
	public function __construct() {
		add_filter( 'gdrts_default_templates_storage_paths', array( $this, 'templates' ) );
		add_filter( 'gdrts_list_thumbs_style_theme', array( $this, 'thumbs_themes' ) );

		add_action( 'gdrts_register_icons_fonts', array( $this, 'register' ) );
		add_action( 'gdrts_single_render_pre_process', array( $this, 'render' ) );

		add_action( 'gdrts_enqueue_core_files_after_evenets', array( $this, 'enqueue' ) );
	}

	public function templates( $paths ) {
		array_unshift( $paths, GDRTS_DT_PATH . 'templates/' );

		return $paths;
	}

	public function thumbs_themes( $themes ) {
		$themes['trend']         = 'Trends Article';
		$themes['trend-comment'] = 'Trends Comment';

		return $themes;
	}

	public function register() {
		require_once( GDRTS_DT_PATH . 'core/font.php' );
		gdrts_register_font( 'gdrts-trend', new gdrts_font_trend() );
	}

	public function render() {
		require_once( GDRTS_DT_PATH . 'core/render.php' );
	}

	public function enqueue() {
		wp_enqueue_script( 'gdrts-demo-trend', GDRTS_DT_URL . 'js/trend.js', array( 'gdrts-events' ) );
	}
}

new gdrts_core_demo_trend();
