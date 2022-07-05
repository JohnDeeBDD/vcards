<?php
/*
Plugin Name: VCards
Plugin URI: https://generalchicken.guru/vforms
Description: A custom layouts application
Version: 1.1
Author: johndee, victorp
*/


//die("vcards");

require_once (plugin_dir_path(__FILE__). 'src/VCards/autoloader.php');
require_once (plugin_dir_path(__FILE__). 'src/VCards/vcardsCPT.php');

require_once (plugin_dir_path(__FILE__). 'src/plugin-update-checker-4.11/plugin-update-checker.php');
$VCards_myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://generalchicken.guru/wp-content/uploads/vcards-details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'vcards'
);

add_shortcode('vcard', [new \VCards\Gridstack, "ShortCodeOutput" ]);

//add_action('wp_enqueue_scripts', [new \VCards\Gridstack(), 'doEnqueuFrontendScripts']);

//add_action('init', [new \VCards\API, ''])

add_action ('rest_api_init', [new \VCards\API, 'doRegisterRoutes']);