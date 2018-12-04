<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";
require_once ROOT . "basicIncludes.php";
 require_once CONTROLLER . "LoginController.php";
LoginController::login();
var_dump(Session::get('userID'));
header("Location: " . DOMAIN . "/dashboard");