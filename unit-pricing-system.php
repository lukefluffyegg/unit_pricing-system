<?php
/**
* Plugin Name: Unit Pricing System
* Plugin URI: www.fluffyegg.com
* Description: Unit Pricing System is a plugin that allows you to enter custom options/prices for surface areas such as wood per mm
* Version: 0.0.1
* Author: Fluffy Egg
* Author URI: www.fluffyegg.com
* Developer: Luke Davies
* Developer URI: www.fluffyegg.com
* Text Domain: unit-pricing-system
* Domain Path: /languages
*
* Copyright: © 2014-2017 FluffyEgg.
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Exit if directly accessed
if(!defined('ABSPATH')) {
   exit;
}

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
ini_set("zlib.output_compression", "Off");

// Checking to see if WooCommerce is active
if(in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins')))) {

   // Activate the plugin with database support
   function unit_pricing_system_activate() {
       require_once('_db_config.php');

       mysqli_query($db,
           "CREATE TABLE IF NOT EXISTS `unit_pricing_system` (
             `id` int(11) PRIMARY KEY AUTO_INCREMENT,
             `product_id` int(11) NOT NULL,
             `product_name` VARCHAR(255) NOT NULL,
             `unit_min` int(11) NOT NULL,
             `unit_max` int(11) NOT NULL,
             `price_per_unit` decimal(10,2)
       ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");
   }

    // Run the activation
    register_activation_hook(__FILE__, 'unit_pricing_system_activate');

    // Run the decativation hook
    register_deactivation_hook(__FILE__, 'unit_pricing_system_deactivate');

    // Include all files
    function include_pricing_system() {
       include('pricing-system.php');
    }

   
      include('price-calculator.php');
    

    function include_add_product() {
       include('pricing-add.php');
    }

    function include_edit_product() {
       include('pricing-edit.php');
    }

    function include_delete_product() {
       include('pricing-delete.php');
    }

function add_menu() {
 add_menu_page('Unit Price System', 'Unit Price System',4, 'pricing-system.php', 'include_pricing_system',
     plugins_url('images/price.png', __FILE__), 690);
}
 add_action('admin_menu', 'add_menu');



}
?>