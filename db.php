<?php 

define('DB_NAME', 'anketa');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . "";
$pdo = "";

try {
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}