<?php
header("Content-Type: text/plain; charset=UTF-8");
require_once($_SERVER['DOCUMENT_ROOT'] . "/basicVars.php");
require_once(ROOT . "basicIncludes.php");

$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);


session_start();

echo File::getMainHouseImage($decoded->id);