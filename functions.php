<?php
/**
 * Universal Base Theme functions and definitions
 *
 * @package Universal_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define theme directory
define( 'UNIVERSAL_DIR', get_template_directory() );
define( 'UNIVERSAL_URI', get_template_directory_uri() );
define( 'UNIVERSAL_VERSION', '1.0.0' );

// Include core theme functionalities
require_once UNIVERSAL_DIR . '/inc/setup.php';
require_once UNIVERSAL_DIR . '/inc/enqueue.php';
