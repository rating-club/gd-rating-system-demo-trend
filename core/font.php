<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class gdrts_font_trend extends gdrts_font {
	public $version = '2.0';
	public $name = 'gdrts-trend';

	public $active = array(
		'thumbs-rating'
	);

	public function __construct() {
		parent::__construct();

		$this->label = __( "Trend Font Icon", "gdrts-custom-font" );

		$this->thumbs = array(
			'arrows' => array(
				'up' => 'u',
				'down' => 'd',
				'label' => __( "Arrows", "gdrts-custom-font" )
			)
		);
	}

	public function register_enqueue_files( $js_full, $css_full, $js_dep, $css_dep ) {
		wp_register_style( 'gdrts-font-trend', GDRTS_DT_URL. 'font/style.css', $css_dep, $this->version );
	}

	public function enqueue_core_files() {
		wp_enqueue_style( 'gdrts-font-trend' );
	}
}
