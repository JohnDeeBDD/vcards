<?php
/*
Plugin Name: VCards
Plugin URI: https://generalchicken.guru/vforms
Description: A custom layouts application
Version: 1.1
Author: johndee, victorp
*/

//die("vforms");

require_once (plugin_dir_path(__FILE__). 'src/VCards/autoloader.php');
//require_once (plugin_dir_path(__FILE__). 'src/VCards/vcardsCPT.php');

require_once (plugin_dir_path(__FILE__). 'src/plugin-update-checker-4.11/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://generalchicken.guru/wp-content/uploads/vcards-details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'vcards'
);