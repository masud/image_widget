<?php
/**
 * Plugin Name: Image Widget
 * Plugin URI: 
 * Description: image upload plugin.
 * Version: 1.0
 * Author: masud
 * Author URI: http://fb.com/masud
 * License: GPLv2 or later
 * Text Domain: iw
 */

require_once 'view/image-upload-widget.php';


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// This slug will be used on all free plugin to avoid loading duplicate item
defined( 'MSD_PREFIX' ) or define( 'MSD_PREFIX', 'msd' );

final class MSD_IMAGE_UPLOAD_WIDGET
{

	/**
	 * Hook WordPress
	 */
	public function __construct()
	{
		
		add_action('admin_enqueue_scripts', array($this, 'msdLoadAdminScripts'));
		
	}
	


	/**
	 * Load Admin Scripts
	 *
	 * @access public
	 * @return void
	 * @since 0.1
	 */
	public function msdLoadAdminScripts()
	{
		
		wp_enqueue_script(
			MSD_PREFIX .'-app-thickbox-js',
			plugins_url('assets/js/app_thickbox.js', __FILE__),
			array('jquery'), '1.0', true
		);
	}
	
}
// Kickstart the class
new MSD_IMAGE_UPLOAD_WIDGET();



