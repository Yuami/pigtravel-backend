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

        #dashboard {
            display: table;
            background: #d8d2d8;
            margin: 60px;
            border-radius: 4px;
            overflow: hidden;
        }

        .fc-toolbar h2 {
            font-size: 16px;
        }

        #reservas {
            padding-right: 10px;
        }


        #content {
            width: calc(100% - 240px);
            height: 100%;
            padding: 50px;
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
            <h1>Hola <?php echo $persona->getNombre(); ?></h1>
            <div class="row index">
                <div class="col-sm-12 col-lg-4">
                    <h5><strong>Proxima reserva</strong></h5>
                    <h6 class="est">
                        <?php
                        if (empty($reservas[0])) {
                            echo '<br>';
                        } else {
                            ?>
                            <a href="/reservations/<?php echo $reservas[0]->getId() ?>">
                                <?php echo $reservas[0]->getFechaReservaFormat() ?>
                            </a>
                            <?php
                        }
                        ?>

                    </h6>
                    <h5><strong>Beneficios anuales</strong></h5>
                    <h6 class="est"><?php
                        $beneficios = 0;
                        foreach ($reservas as $reserva) {
                            if ($reserva->getFechaReservaYear() == '2019') {
                                $beneficios += $reserva->getPrecio();
                                }
                            }

                        echo $beneficios ?>€</h6>
                    <h5><strong>Mensajes pendientes</strong></h5>
                    <h6 class="est">
                        <a href="/messages">
                        <?php
                        $mensajesPendientes = 0;
                        foreach ($mensajes as $mensaje) {
                            if ($mensaje->getLeido() == 1) {
                                $mensajesPendientes++;
                            }
                        }
                        echo $mensajesPendientes ?>
                        </a></h6>
                    <h5><strong>Ultimas reservas</strong></h5>
                    <table id="reservas">
                        <?php foreach ($reservas as $reserva) { ?>
                            <tr onClick="location.href='/reservations/<?php echo $reserva->getId()?>'">
                                <td id="reservas"><?php echo $reserva->getVivienda()->getNombre() ?></td>
                                <td id="reservas"><?php echo $reserva->getPrecio() ?>€</td>
                                <td id="estado-reserva" class="badge badge-pill">
                                    <?php echo $reserva->getNombreEstado(); ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-lg-4 col-12 chart">
                    <h5><strong>Beneficios</strong></h5>
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
                <div class="col-lg-4 col-12">
                    <h5><strong>Calendario</strong></h5>
                    <div id="calendario">
                            <div id="calendar"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<div id="chart"></div>
<svg width="960" height="500"></svg>
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
            backgroundColor: "#d8d2d8",
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