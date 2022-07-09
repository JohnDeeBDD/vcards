<?php

namespace VCards;

class API{


	public function doRegisterRoutes() {

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
		register_rest_route(
			"vcards/v1",
			"set-vcard-data",
			array(
				'methods'             => [ 'POST', 'GET' ],
				'callback'            => function ($args) {
					return ($this->setVCardData($args));

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
		
		register_rest_route(
			"vcards/v1",
			"get-vcard-data",
			array(
				'methods'             => [ 'POST', 'GET' ],
				'callback'            => function ($args) {
					//return [];
					$response = ( $this->getVCardData($args) );
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

	public function setVCardData($args){
		/* To see this data via the command line [there is a terminal in the Cloud9 IDE]
		 * cd /var/www/html
		 * wp post meta get ### vcard-data
		 * where ### is the shortcode ID / vcard post ID
		 */
		$VCardPostID = $args['vcard-post-id'];
		$data = $args['data'];
		\update_post_meta($VCardPostID, "vcard-data", $data);
		return "MSG from server: success";
	}
	
	public function getVCardData($args){
		$VCardPostID = $args->get_param( 'vcard-post-id' );
		//$VCardPostID = $arg['vcard-post-id'];
		$data=\get_post_meta($VCardPostID, "vcard-data");
		return \wp_send_json($data[0]);
	}
	
}