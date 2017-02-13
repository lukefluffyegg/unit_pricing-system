<?php


 if(!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
 } else {
    include('_db_config.php');

    function unit_pricing_system_deactivate {
        mysqli_query($db, "DROP TABLE `unit_pricing_system`");
    }
 }

 ?>