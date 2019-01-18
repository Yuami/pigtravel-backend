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

        #mainCalendar {
            font-size: 10px !important;
        }

        #content {
            width: calc(100% - 240px);
            height: 100%;
            padding: 50px;
            display: table-cell;
        }

        .legend{
            font-size: 10px;
        }
        h3.est {
            text-align: center;
        }

        .nopadding {
            padding-left: 0px;
            padding-right: 0px;
        }
        .axis path,
        .axis line {
            fill: none;
            stroke: #000;
        }
        .bar {
            fill: steelblue;
        }
        .x.axis path {
            display: none;
        }

        @media only screen and (max-width: 600px) {
            #dashboard {
                margin: 10px;
            }
            #content {
                padding: 10px;

            }
        }

    </style>
</head>

<body>
<?php include_once("header.php"); ?>

    <div id="dashboard">
        <div id="content">
            <h1>Hola <?php echo $persona->getNombre(); ?></h1>
            <div class="row">
                <div class="col-sm-12 col-lg-3 nopadding">
                    <h5><strong>Proxima reserva</strong></h5>
                    <h6 class="est">
                        <?php
                        if (empty($reservas[0])) {
                            echo '<br>';
                        } else {
                            ?>
                            <a href="/reservations/<?php echo $reservas[0]->getId(); ?>">
                                <?php echo $reservas[0]->getFechaReservaFormat(); ?>
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
                <div class="col-lg-5 col-12 ">
                    <h5><strong>Beneficios</strong></h5>
                    <div id="grafic">
                        <?php
                        $dataPoints = array();
                        foreach($benMes as $row){
                              array_push($dataPoints, array("y"=> $row->beneficioMes));
                        }
                        ?>
                        <div id="chart-svg">

                        </div>
                    </div>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
                <div class="col-lg-4 col-12 nopadding">
                    <h5><strong>Calendario</strong></h5>
                    <div id="calendario">
                        <div id="calendars">
                            <div id="mainCalendar" data-f_inicio="2019-11-06 00:00:00"
                                 data-f_fin="2019-12-06 00:00:00"></div>
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

            </div>

        </div>
    </div>
<?php include_once CALENDAR ?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="/js/calendar.js"></script>
<script src="/js/estadoReserva.js"></script>
<script src="//d3js.org/d3.v3.min.js"></script>
<script type="text/javascript">
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            axisX:{
                labelFormatter: function(e){
                    return  "Ene";
                }
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    };

    var margin = {top: 20, right: 150, bottom: 100, left: 25},
        width = 540 - margin.left - margin.right,
        height = 350 - margin.top - margin.bottom;

    var svg = d3.select("#chart-svg").append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    d3.csv("/csv/data.csv", function (data) {

        var headers = ["Casa playa", "La casa blanca","Villa Antonia"];

        var layers = d3.layout.stack()(headers.map(function (priceRange) {
            return data.map(function (d) {
                return {x: d.month, y: +d[priceRange]};
            });
        }));
        var yGroupMax = d3.max(layers, function (layer) {
            return d3.max(layer, function (d) {
                return d.y;
            });
        });
        var yStackMax = d3.max(layers, function (layer) {
            return d3.max(layer, function (d) {
                return d.y0 + d.y;
            });
        });

        var xScale = d3.scale.ordinal()
            .domain(layers[0].map(function (d) {
                return d.x;
            }))
            .rangeRoundBands([25, width], .08);

        var y = d3.scale.linear()
            .domain([0, yStackMax])
            .range([height, 0]);

        var color = d3.scale.ordinal()
            .domain(headers)
            .range(["#98ABC5", "#8a89a6","#878787"]);

        var xAxis = d3.svg.axis()
            .scale(xScale)
            .tickSize(0)
            .tickPadding(6)
            .orient("bottom");

        var yAxis = d3.svg.axis()
            .scale(y)
            .orient("left")
            .tickFormat(d3.format(".2s,€"));

        var layer = svg.selectAll(".layer")
            .data(layers)
            .enter().append("g")
            .attr("class", "layer")
            .style("fill", function (d, i) {
                return color(i);
            });

        var rect = layer.selectAll("rect")
            .data(function (d) {
                return d;
            })
            .enter().append("rect")
            .attr("x", function (d) {
                return xScale(d.x);
            })
            .attr("y", height)
            .attr("width", xScale.rangeBand())
            .attr("height", 0);

        rect.transition()
            .delay(function (d, i) {
                return i * 10;
            })
            .attr("y", function (d) {
                return y(d.y0 + d.y);
            })
            .attr("height", function (d) {
                return y(d.y0) - y(d.y0 + d.y);
            });

        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis)
            .selectAll("text").style("text-anchor", "end")
            .attr("dx", "-.8em")
            .attr("dy", ".15em")
            .attr("transform", function (d) {
                return "rotate(-45)"
            });

        svg.append("g")
            .attr("class", "y axis")
            .attr("transform", "translate(20,0)")
            .call(yAxis)
            .append("text")
            .attr("transform", "rotate(-90)")
            .attr({"x": -100, "y": -70})
            .attr("dy", ".75em");

        var legend = svg.selectAll(".legend")
            .data(headers.slice().reverse())
            .enter().append("g")
            .attr("class", "legend")
            .attr("transform", function (d, i) {
                return "translate(0," + i * 10 + ")";
            });

        legend.append("rect")
            .attr("x", width - 8)
            .attr("width", 8)
            .attr("height", 8)
            .style("fill", color);

        legend.append("text")
            .attr("x", width - 12)
            .attr("y", 3)
            .attr("dy", ".35em")
            .style("text-anchor", "end")
            .text(function (d) {
                return d;
            });




            y.domain([0, yStackMax]);

            rect.transition()
                .duration(500)
                .delay(function (d, i) {
                    return i * 10;
                })
                .attr("y", function (d) {
                    return y(d.y0 + d.y);
                })
                .attr("height", function (d) {
                    return y(d.y0) - y(d.y0 + d.y);
                })
                .transition()
                .attr("x", function (d) {
                    return xScale(d.x);
                })
                .attr("width", xScale.rangeBand());



    });

</script>
</body>
</html>