<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";
require_once ROOT . "basicIncludes.php";
require_once CONTROLLER . "LoginController.php";
Cookie::set('lastEmail', $_POST['emailLogin'], 30);
if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin']))
    LoginController::login($_POST['emailLogin'], $_POST['passwordLogin']);
header("Location: " . DOMAIN);
