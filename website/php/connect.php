<?php
$server = 'mysql:dbname=fastgrade;host=localhost;charset=utf8';
$user = 'root';
$password = 'root';

try {
	$data_base = new PDO($server, $user, $password);
	$data_base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}
?>
