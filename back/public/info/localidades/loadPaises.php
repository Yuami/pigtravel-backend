<?php

use Model\DAO\DB;

header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'] . "/basicVars.php";

$statement ="select p.name, p.id
from countries p group by p.name";

$res = DB::conn()->prepare($statement);
$res->execute();
$rows = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
