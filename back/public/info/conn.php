<?php
$hostname='localhost';
$username='root';
$password='';
$dsn = "mysql:host=$hostname;dbname=travel";

try {
	$conn = new PDO($dsn, $username, $password);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}