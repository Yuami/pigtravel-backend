<?php

//$house = \Config\Photos\HousePhoto::find(1);
//print_r($house);
$file = \Config\File::find('5.jpg','public/img/casas/');
$file3 = \Config\File::find('logo.png','public/img/');

$file->changeNames($file3);
$file->changeNames($file3);
