<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Pig Travel</title>
</head>

<body>
<?php include_once("header.php"); ?>

<section style="height:300px" class="bg-gradient-warning">
    <h1>Hola <?php echo $persona->getNombre(); ?></h1>
    <div id="dashboard">
        <div id="content">
            <div class="row">
                <div  class="est col-sm-6 col-lg-6">
                    <h4>Calendario</h4>
                    <div id="calendario">
                        <button type="button" class="fc-prev-button btn btn-primary ml-auto" id="prevMonth">
                            <span class="fa fa-chevron-left"></span> PREV
                        </button>
                        <button type="button" class="fc-prev-button btn btn-primary ml-auto" id="nextMonth">
                            NEXT <span class="fa fa-chevron-right"></span>
                        </button>
                        <div id="calendars">
                            <div id="mainCalendar" data-f_inicio="2018-11-06 00:00:00" data-f_fin="2018-11-07 00:00:00"></div>
                            <div id="nextCalendar"></div>
                        </div>
                    </div>
                </div>

                <div  class="est col-sm-6 col-lg-6">
                    <h4>Ultimas reservas</h4>
                </div>
            </div>
            <div class="row estBasiques">
                <div  class="est col-sm-4 col-lg-4">
                    <span>Proxima reserva</span>
                    <h3>28/10/19</h3>
                </div>
                <div class="est col-sm-4 col-lg-4">
                    <span>Beneficios anuales</span>
                    <h3>24,834€</h3>

                </div>
                <div class="est col-sm-4 col-lg-4">
                    <span>Mensajes pendientes</span>
                    <h3>3</h3>

                </div>
            </div>
        </div>
    </div>


</section>

<?php include_once("footer.php") ?>
<?php include_once "footer.php" ?>
<?php include_once CALENDAR ?>
<script src="/js/calendar.js"></script>
<script src="/js/estadoReserva.js"></script>

<style>
    .sunny-morning-gradient {
        background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
    }
    * {
        box-sizing: border-box;
    }
    #dashboard {
        display: table;
        width: 1200px;
        background: #D8D6D6;
        margin: 60px auto;
        border-radius: 4px;
        overflow: hidden;
    }

    #content {
        width: calc(100% - 240px);
        height: 100%;
        padding: 25px;
        display: table-cell;
    }

    .estBasiques{
        margin-left: 50px;
        margin-right: 50px;
    }
    .est{
        text-align: center;
    }
</style>
</body>
</html>