<?php

use Config\Cookie;
use Controller\LoginController;

Cookie::set('lastEmail', $_POST['emailLogin'], 30);
if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin']))
    LoginController::login($_POST['emailLogin'], $_POST['passwordLogin']);
header("Location: " . DOMAIN);
