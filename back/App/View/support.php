<?php
if(isset($_POST["submit"])) {
   self::store();
}
?>
<!DOCTYPE html>
<html lang="en" xmlns:color="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Soporte</title>
    <style>

        .inputSoporte{
            padding-left: 150px;
            padding-right: 150px;
        }

        @media only screen and (max-width: 600px) {
            .inputSoporte {
                padding-right: 10px;
                padding-left: 10px;
            }

        }
    </style>
</head>

<body>
<?php include_once("header.php") ?>
<div class="container-fluid">
    <div class="row breadcrumb-row">
        <div class="col-md-10 offset-md-1">
            <h1>Soporte</h1>
            <ol class="bg-transparent pt-0 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Soporte</li>
            </ol>
        </div>
    </div>
    <div class="inputSoporte">

    <form method="POST" action="/support">
            <label for="comment">¿En que podemos ayudarte? </label>
            <textarea rows="5" class="form-control" name="comment"></textarea><br>
            <input type="submit" value="Enviar" class="btn btn-primary float-right ml-2">
            <input type="reset" value="Cancelar" class="btn float-right">
    </form>
    </div>
</div>
<?php include_once("footer.php") ?>
</body>

</html>