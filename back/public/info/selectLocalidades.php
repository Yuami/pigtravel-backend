<?php

use Model\DAO\DB;

header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";

$statement ="select chi.name, chi.id
from cities chi where region_id = 970 group by chi.name";

$res = DB::conn()->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
var_dump($rows);
echo json_encode($rows);
