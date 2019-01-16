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

        .axis path,
        .axis line {
            fill: none;
            stroke: #000;
            shape-rendering: crispEdges;
        }

        .bar {
            fill: steelblue;
        }

        .x.axis path {
            display: none;
        }

    </style>
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
            <div class="row" id="grafic"></div>
    </div>
    </div>
</section>
<?php include_once CALENDAR ?>
<script src="/js/calendar.js"></script>
<script src="/js/estadoReserva.js"></script>
<script src="//d3js.org/d3.v3.min.js"></script>
<script>

    var margin = {top: 20, right: 20, bottom: 30, left: 40},
        width = 960 - margin.left - margin.right,
        height = 200 - margin.top - margin.bottom;

    var x = d3.scale.ordinal()
        .rangeRoundBands([0, width], .5);

    var y = d3.scale.linear()
        .rangeRound([height, 0]);

    var color = d3.scale.ordinal()
        .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);
    var colors = {
        "benViv1":"#cb2e2e",
        "benViv2":"#ED7D30"
    };

    var matchKeys = [
        "month",
        "benViv1",
        "benViv2"

    ]
    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left")
        .tickFormat(d3.format(".2s"));


    var svg = d3.select("#grafic").append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    d3.csv("/csv/data.csv", function(error, data) {
        if (error) throw error;


        color.domain(d3.keys(data[0]).filter(function(key) { return key !== "month"; }));

        data.forEach(function(d) {
            var y0 = 0;

            d.ages = color.domain().map(function(name) { return {name: name, y0: y0, y1: y0 += +d[name]}; });


            d.ages = d.ages.sort(function(a, b) {
                return matchKeys.indexOf(a.name) - matchKeys.indexOf(b.name);
            });

            var y0 = 0;
            var aa = d.ages.forEach(function(dd) {
                dd.y0 = y0;
                dd.y1= y0 += +d[dd.name]
            })


            d.total = d.ages[d.ages.length - 1].y1;
        });



        //data.sort(function(a, b) { return b.total - a.total; });

        x.domain(data.map(function(d) { return d.month; }));
        y.domain([0, d3.max(data, function(d) { return d.total; })]);

        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)
            .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text("Population");


        var state = svg.selectAll(".state")
            .data(data)
            .enter().append("g")
            .attr("class", "g")
            .attr("transform", function(d) { return "translate(" + x(d.month) + ",0)"; });


        state.selectAll("rect")
            .data(function(d) {  return d.ages; })
            .enter().append("rect")
            .attr("width", x.rangeBand())
            .attr("y", function(d) { return y(d.y1); })
            .attr("height", function(d) { return y(d.y0) - y(d.y1); })
            .style("fill", function(d) { console.log(d.name); return colors[d.name]; });



    });
</script>
</body>
</html>