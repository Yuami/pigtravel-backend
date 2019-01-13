<?php

use Config\Config;

// TODO: Errors only on dev
Config::errorsOn();

$config = Config::singleton();

//server
$config->set('dbhost', 'localhost');
$config->set('dbname', 'travel2');
$config->set('dbuser', 'phil');
$config->set('dbpass', 'ifc21B17*');


//local
//$config->set('dbhost', 'localhost');
//$config->set('dbname', 'travel2');
//$config->set('dbuser', 'root');
//$config->set('dbpass', '');