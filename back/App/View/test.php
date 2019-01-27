<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
print_r($_FILES);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="pictures" accept="image/*"/>
    <input type="submit" value="upload"/>
</form>
</body>
</html>
