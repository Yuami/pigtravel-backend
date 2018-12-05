<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";
session_start();
session_destroy();
header("Location: " . DOMAIN);


