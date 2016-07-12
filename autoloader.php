<?php
/**
 * Plugin Name: Yoast.com settings
 * Description: Adds settings to manage yoast.com, adds meta fields, setting screens, etc.
 * Author: Team Yoast
 * Author URI:  https://yoast.com
 */

namespace Yoast\YoastCom\Menu;

spl_autoload_register( function( $classname ) {
	if ( false !== strpos( $classname, 'Yoast\\YoastCom\\Menu\\' ) ) {
		$classname = str_replace( 'Yoast\\YoastCom\\Menu\\', '', $classname );

		$classname = strtolower( $classname );
		$classname = str_replace( '_', '-', $classname );

		require_once( dirname( __FILE__ ) . '/php/class-' . $classname . '.php' );
	}
});
