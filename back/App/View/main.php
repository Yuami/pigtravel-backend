<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Pig Travel</title>
    <style>

        * {
            box-sizing: border-box;
        }
        body{

            background: #ECECEC;
        }

        #dashboard {
            display: table;
            margin: 60px;
            border-radius: 4px;
            overflow: hidden;
        }

        .fc-toolbar h2 {
            font-size: 16px;
        }

        #reservas {
            padding-right: 10px;
            width: 100%;
        }


        #content {
            width: calc(100% - 240px);
            height: 100%;
            padding-right: 50px;
            padding-left: 50px;
            display: table-cell;

        }
        h3.est {
            text-align: center;
        }

        .axis path,
        .axis line {
            fill: none;
            stroke: #000;
        }
        .x.axis path {
            display: none;
        }
        #chartContainer{
            height: 300px;
        }
        .card-header{
            background-color: #5f5f5f;
            color: #BCBCBC;

        }
        .carddd{
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }

        @media only screen and (max-width: 600px) {
            #dashboard {
                margin: 10px;
            }
            #content {
                padding: 20px;

            }
            .index{
                font-size: 15px;
            }
            h6.est{
                font-size: 25px;
            }
            .chart{

                visibility: hidden;
                clear: both;
                float: left;
                margin: 10px auto 5px 20px;
                width: 28%;
                display: none;

            }


        }

    </style>
</head>

<body>
<?php include_once("header.php"); ?>

    <div id="dashboard">
        <div id="content">
            <div class="row index">
                <div class="col-sm-12 col-lg-4">

                    <div class="card carddd mb-4">
                        <div class="card-header">
                            <h5>Beneficios anuales</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="est"><?php
                                $beneficios = 0;
                                foreach ($reservas as $reserva) {
                                    if ($reserva->getFechaReservaYear() == 2019) {
                                        $beneficios += $reserva->getPrecio();
                                    }
                                }

                                echo $beneficios; ?>€</h6>
                        </div>

                    </div>
                    <div class="card carddd card mb-4">
                        <div class="card-header">
                            <h5>Mensajes pendientes</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="est">
                                <a href="/messages">
                                    <?php
                                    $mensajesPendientes = 0;
                                    foreach ($mensajes as $mensaje) {
                                        if ($mensaje->getLeido() == 1) {
                                            $mensajesPendientes++;
                                        }
                                    }
                                    echo $mensajesPendientes; ?>
                                </a></h6>
                        </div>

                    </div>
                    <div class="card carddd mb-4">
                        <div class="card-header">
                            <h5>Proxima reserva</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="est">
                                <?php
                                if (empty($reservas[0])) {
                                    echo 'No tienes reservas';
                                } else {
                                    ?>
                                    <a href="/reservations/<?php echo $reservas[0]->getId(); ?>">
                                        <?php echo $reservas[0]->getFechaReservaFormat(); ?>
                                    </a>
                                    <?php
                                }
                                ?>

                            </h6>
                        </div>

                    </div>
                    <div class="card carddd card mb-4">
                        <div class="card-header">
                            <h5>Ultimas reservas</h5>
                        </div>
                        <div class="card-body">
                            <table id="reservas">
                                <?php
                                if (empty($reservas)) {
                                    echo 'No tienes reservas';
                                } else {
                                foreach ($reservas as $reserva) {
                                    ?>
                                    <tr onClick="location.href='/reservations/<?php echo $reserva->getId()?>'">
                                        <td id="reservas"><?php echo $reserva->getVivienda()->getNombre() ?></td>
                                        <td id="reservas"><?php echo $reserva->getPrecio() ?>€</td>
                                        <td id="estado-reserva" class="badge badge-pill">
                                            <?php echo $reserva->getNombreEstado(); ?>
                                        </td>
                                    </tr>
                                <?php }} ?>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-12 chart">
                    <div class="card carddd mb-4">
                        <div class="card-header">
                            <h5>Beneficios</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            $dataPoints = array();
                            $meses=array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
                            foreach($benMes as $row){
                                array_push($dataPoints, array("x"=> $row->mes-1,"y"=> $row->beneficioMes,"label"=>$row->nombre));
                            }
                            for($x=0;$x<=11;$x++){
                                array_push($dataPoints, array("x"=> $x,"y"=> 0,"label"=>$meses[$x]));
                            }
                            ?>
                            <div id="chartContainer"></div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-12">
                    <div class="card carddd mb-4">
                        <div class="card-header">
                            <h5>Calendario</h5>
                        </div>
                        <div class="card-body">
                            <div id="calendario">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php include_once("footer.php") ?>

<script src="//d3js.org/d3.v4.min.js"></script>
<?php include_once CALENDAR ?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="/js/calendar.js"></script>
<script src="/js/estadoReserva.js"></script>
<script type="text/javascript">

        $('#calendar').fullCalendar({
            defaultDate: moment(),
            header: {
                left: '',
                center: 'title',
                right: ''
            },
            footer: {
                left: 'prev,next',
                center: '',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            events: [
            <?php foreach ($reservas as $reserva){
                ?>
                {
                title:"<?php echo $reserva->nombre?>",
                start: '<?php echo $reserva->getCheckIn()?>',
                end: '<?php echo $reserva->getCheckOut()?>',
                url: '/reservations/<?php echo $reserva->getId()?>'
            },<?php } ?>
            ],
        });


    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            axisX:{
                interval: 1
            },
            data: [{
                type: "stackedColumn",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }],
            axisY:{
                valueFormatString:"#0€",
                gridColor: "#B6B1A8",
                tickColor: "#B6B1A8"
            }
        });
        chart.render();
    };

</script>
</body>
</html>