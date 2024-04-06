<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'database_name');
define('DB_USER', 'username');
define('DB_PASS', 'password');

// Other global configuration
define('SITE_NAME', 'My Website');

// Create a PDO instance
try {
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>