<?php
$hostname='sql142.main-hosting.eu';
$username='u333704226_pigtr';
$password='ifc21B17*';
$dsn = "mysql:host=$hostname;dbname=u333704226_pigtr";

try {
	$conn = new PDO($dsn, $username, $password);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}