<?php
/* Database config for plugin */
 include('../../wp-config.php');

// Database Variables
 $username = DB_USER;
 $password = DB_PASSWORD;
 $database = DB_NAME;
 $host     = DB_HOST;

 $db = mysqli_connect($host, $username, $password, $database) or die(mysql_error());

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MSQL:" . mysqli_connect_errno();
    }
?>