<?php

/**
 * Configuration for database connection
 *
 */

//$host       = "127.0.0.1";
$host       = "127.0.0.1";
$username   = "root";
$password   = "root";
$dbname     = "test";
$dsn        = "mysql:host=$host;dbname=$dbname;port=3306";
//$dsn        = "mysql:host=$host;dbname=$dbname";
$$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
?>