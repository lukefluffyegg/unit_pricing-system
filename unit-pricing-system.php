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

 // Checking to see if WooCommerce is active
 if(in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins')))) {

    // Activate the plugin with database support
    function unit_pricing_system_activate() {
        include('_db_config.php');

        mysqli_query($db, 
            "CREATE TABLE IF NOT EXISTS `unit_pricing_system` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `unit_option_name` VARCHAR NOT NULL,
              `unit_min` int(11) NOT NULL,
              `unit_max` int(11) NOT NULL,
              `price_per_unit` decimal(10,2) NOT NULL,
               PRIMARY KEY (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");
    }

     // Run the database query
     register_activation_hook(__FILE__, 'unit_pricing_system_activate');
 }

 // this is a test

 //another test

