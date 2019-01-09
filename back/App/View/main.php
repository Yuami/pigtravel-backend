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
    <div id="dashboard">
        <div id="content">
            <h1>Hola <?php echo $persona->getNombre(); ?></h1>
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <h4>Proxima reserva</h4>
                    <h6 class="est"><?php echo $reservas[0]->getFechaReservaFormat() ?></h6>
                    <h4>Beneficios anuales</h4>
                    <h6 class="est"><?php
                       $beneficios=0;
                       foreach ($reservas as $reserva){
                              if($reserva->getFechaReservaYear()=='2019'){
                                  $beneficios+=$reserva->getPrecio();
                              }
                       }
                       echo $beneficios?>€</h6>
                    <h4>Mensajes pendientes</h4>
                    <h6 class="est"><?php
                        $mensajesPendientes=0;
                        foreach ($mensajes as $mensaje){
                            if($mensaje->getLeido()=='1'){
                                $mensajesPendientes++;
                            }
                        }
                        echo $mensajesPendientes?></h6>

                </div>

                <div class="col-lg-5">
                    <h4>Calendario</h4>
                    <div id="calendario" class="col-lg-10">
                        <div id="calendars">
                            <div id="mainCalendar" data-f_inicio="2019-11-06 00:00:00" data-f_fin="2019-12-06 00:00:00"></div>
                        </div>
                        <div class="text-center">
                        <button type="button" class="fc-prev-button btn  ml-auto" id="prevMonth">
                            <span class="fa fa-chevron-left"></span>
                        </button>
                        <button type="button" class="fc-prev-button btn  ml-auto" id="nextMonth">
                            <span class="fa fa-chevron-right"></span>
                        </button>
                        </div>
                    </div>
                </div>
                <div  class="col-lg-4">
                    <h4>Ultimas reservas</h4>
                    <table>
                       <?php foreach ($reservas as $reserva) { ?>
                        <tr>
                            <td id="reservas"><?php echo $reserva->getFechaReservaFormat() ?></td>
                            <td id="reservas"><?php echo $reserva->getVivienda()->getNombre() ?></td>
                            <td id="reservas"><?php echo $reserva->getPrecio() ?>€</td>
                            <td id="reservas">
                                <small>
                                    <span id="estado-reserva" class="badge badge-pill"><?php echo $reserva->getNombreEstado() ?></span>
                                </small>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>




        </div>
    </div>
    </div>


</section>

<?php include_once CALENDAR ?>
<script src="/js/calendar.js"></script>
<script src="/js/estadoReserva.js"></script>

<style>
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
    .fc-toolbar h2{
        font-size: 16px;
    }
    #reservas{
        padding-right: 10px;
    }
    #mainCalendar{
        font-size: 10px !important;
    }

    #content {
        width: calc(100% - 240px);
        height: 100%;
        padding: 50px;
        display: table-cell;
    }

    h3.est{
        text-align: center;
    }
</style>
</body>
</html>