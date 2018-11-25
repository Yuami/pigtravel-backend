<?php
require_once $_SERVER['HTTP_HOST'] . "/app/models/DAO/DB.php";
require_once $_SERVER['HTTP_HOST'] . "/app/config/Session.php";
require_once $_SERVER['HTTP_HOST'] . "/app/config/Cookie.php";

Session::start();

if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
    $email = $_POST['emailLogin'];
    $pass = $_POST['passwordLogin'];
    Cookie::set("lastEmail", $email, 30);

    $statement = DB::conn()->prepare("select correo, password from persona where correo = :email and password = :password");
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $pass);

    $statement->execute();
    $count = $statement->rowCount();

    if ($count) {
        Session::set('userID', $email);
        Session::delete('loginStatus');
        header("Location: ../index.php");
    } else {
        Session::set('loginStatus', 'Wrong email or password!');
        header("Location: ../login.php");
    }
} else {
    if (!Session::isSet('login')) {
        Session::set('loginStatus', 'No data has been entered!');
        header("Location: ../login.php");
    } else {
        header("Location: ../index.php");
    }
}
