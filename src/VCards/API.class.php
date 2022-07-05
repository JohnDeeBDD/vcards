<?php

namespace VCards;

class API{


	public function doRegisterRoutes() {
		//die("line 132");

		//API is: /wp-json/vcards/v1/get-shortcode-html?shortcode=XXXXXX
		register_rest_route(
			"vcards/v1",
			"get-shortcode-html",
			array(
				'methods'             => [ 'POST', 'GET' ],
				'callback'            => function ($args) {
					//return [];
					$response = ( $this->getShortcode($args) );

					echo $response;
				},
				'permission_callback' => function () {

					//Remove this line to active nonce system:
					return TRUE;

					if ( ! ( current_user_can( "install_plugins" ) ) ) {
						return false;
					}

					return true;
				},
				'validate_callback'   => function () {
					return true;
				}
			)
		);
	}

	public function getShortcode($args){

		$x = \do_shortcode( $args['shortcode']);
		//$x = trim(preg_replace('/\s\s+/', ' ', $x));
		return $x;
	}
}