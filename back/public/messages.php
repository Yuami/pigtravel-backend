<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>Mensajes</title>
</head>

<body>
<?php include_once("header.php") ?>
<section>
    <div class="gran">
        <div class="row">
             <h1>Messages</h1>
        </div>
        <div class="row">
            <p> <a href="https://www.w3schools.com">Menu</a> > Messages</p>
        </div>
        <div class="row">
             <div class="dropdown">
                 <button  type="button" class="filtro dropdown-toggle" data-toggle="dropdown">
                       <i class="fas fa-home"></i>
                 </button>
                 <div class="dropdown-menu" id="dropdownidTipoVivienda">
                 </div>
             </div>
        <div>
        <button type="button" class="filtro">
            <i class="far fa-eye"></i>
        </button>
    </div>
    <div>
        <button  type="button" class="filtro">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
    </div>
        <table class="table table-striped" id="llistaMensajes">

        </table>

    </div>
</section>

<?php include_once("footer.php") ?>
<script src="js/selects/selectMensajes.js"></script>

</body>
</html>