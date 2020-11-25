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
			'arrows' => array( 'up' => 'u', 'down' => 'd', 'label' => __( "Arrows", "gdrts-custom-font" ) )
		);
	}

	public function enqueue_core_files() {
		$dep = gdrts_plugin()->load_full_css() ? 'gdrts-full' : 'gdrts-ratings-core';
		$url = plugins_url( '/gdrts-demo-trend/font/style.css' );

		wp_enqueue_style( 'gdrts-trend', $url, array( $dep ), $this->version );
	}
}
