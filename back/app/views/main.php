<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Plantilla para backend</title>
    <link rel='stylesheet' href='../../public/css/fullcalendar.css' />

    <script src='../../public/js/moment.min.js'></script>
    <script src='../../public/js/fullcalendar.js'></script>
</head>

<body>
<?php include_once("header.php"); ?>

<section style="height:300px" class="bg-gradient-warning">
    <h1>Index</h1>

</section>

<?php include_once("footer.php") ?>

<style>
    .sunny-morning-gradient {
        background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
    }
</style>
</body>
</html>