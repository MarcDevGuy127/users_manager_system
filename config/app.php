<?php

// defining consts for reference database info
define('DB_HOST', 'localhost');
define('DB_NAME', 'SistemaWebCRUD');
define('DB_USER', 'sa');
define('DB_PASS', 'Passw0rd');

// trying connection with database, using the defined consts
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}
?>