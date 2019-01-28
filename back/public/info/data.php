<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
// output the column headings
fputcsv($output, array('beneficioMes', 'nombre', 'mes'));
// fetch the data
$enlace = mysqli_connect('localhost', 'root', '');
$bd_seleccionada = mysqli_select_db( $enlace,'travel');

$rows = mysqli_query($enlace,'SELECT sum(r.precio) as beneficioMes,v.nombre, month(r.fechaReserva) as mes from reserva r
       inner join reserva_has_estado rhe on r.id = rhe.idReserva
       inner join vivienda v on r.idVivienda = v.id
       inner join estado_has_idioma ehi on rhe.idEstado = ehi.idEstado
       inner join cliente c on r.idCliente = c.idPersona
       inner join persona p on c.idPersona = p.id where v.idVendedor= 7
       group by r.idVivienda,MONTH (r.fechaReserva)');
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);


?>

