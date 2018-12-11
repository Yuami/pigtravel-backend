<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once ROOT . "libraries.php" ?>
    <title>Plantilla para backend</title>
    <link rel='stylesheet' href='../../css/fullcalendar.css' />

    <script src='../../js/moment.min.js'></script>
    <script src='../../js/fullcalendar.js'></script>
</head>

<body>
<?php include_once("header.php"); ?>

<section>
    <h1>Index</h1>
<div id="calendar"></div>
</section>
<script>
    $('#calendar').fullCalendar({
        defaultDate: '2014-11-10',
        defaultView: 'agendaWeek',
        events: [
            {
                start: '2014-11-10T10:00:00',
                end: '2014-11-10T16:00:00',
                rendering: 'background'
            }
        ]
    });
</script>
<?php include_once("footer.php") ?>


</body>
</html>