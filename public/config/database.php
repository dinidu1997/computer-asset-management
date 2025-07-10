<?php
declare(strict_types=1);

// Database configuration
if (!defined('DB_HOST')) define('DB_HOST', '127.0.0.1');
if (!defined('DB_USER')) define('DB_USER', 'adminuser');
if (!defined('DB_PASS')) define('DB_PASS', 'bB@kla!@#123');
if (!defined('DB_NAME')) define('DB_NAME', 'asset_management');

// Create a database connection
function getDatabaseConnection(): mysqli {
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check for connection errors
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    return $connection;
}