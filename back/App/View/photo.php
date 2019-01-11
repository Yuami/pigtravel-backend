<?php
$path = \Config\Photos\Photos::me()->mainPath();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Document</title>
</head>
<body>
<?php include_once VIEW . 'header.php'?>
<form method="POST" action="/upload" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    <input type="file" name="pictures" accept="image/*"/>
    <input type="submit" value="upload"/>
</form>
</body>
</html>
