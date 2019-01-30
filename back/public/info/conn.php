<?php
$hostname='localhost';
$username='root';
$dbname='travel';
$password='';
$dsn = "mysql:host=$hostname;dbname=$dbname";

try {
	$conn = new PDO($dsn, $username, $password);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}