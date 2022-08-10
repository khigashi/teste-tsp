<?php 
/*
Plugin Name: Teste TSP
Plugin URI: https://github.com/estevaoacioli
Description: Teste para Desenvolvedor TSP
Author: Valorag - Estevão Acioli
Version: 1.0.0
Author URI: https://github.com/estevaoacioli
Text Domain: tsp-text
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html        

*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define Text Domain
define('TSP_TEXT', 'tsp-text' );

// Main Files
require_once( 'functions.php' );
require_once( 'settings.php' );
require_once( 'shortcode.php' );
require_once( 'api.php' );

