<?php
require_once("conn.php");
session_start();

if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
    $email = $_POST['emailLogin'];
    $pass = $_POST['passwordLogin'];

    $statement = $conn->prepare("select correo, password from persona where correo = :email and password = :password");
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $pass);

    $statement->execute();
    $count = $statement->rowCount();

    if ($count) {
        $_SESSION['userID'] = $email;
        $_SESSION['loginStatus'] = 'successfull';
        header("Location: ../index.php");
    } else {
        $_SESSION['loginStatus'] = 'wrongData';
        header("Location: ../login.php");
    }
}
 else {
    if (!isset($_SESSION['login'])) {
        $_SESSION['loginStatus'] = 'noData';
        header("Location: ../login.php");
    } else {
        header("Location: ../index.php");
    }
}
