<?php

use Config\File;

header("Content-Type: text/plain; charset=UTF-8");
require_once($_SERVER['DOCUMENT_ROOT'] . "/basicVars.php");

$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content);

echo File::getMainHouseImage($decoded->id);