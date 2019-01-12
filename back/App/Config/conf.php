<?php

use Config\Config;

// TODO: Errors only on dev
Config::errorsOn();

$config = Config::singleton();

//server
//$config->set('dbhost', 'sql142.main-hosting.eu');
//$config->set('dbname', 'u333704226_pigtr');
//$config->set('dbuser', 'u333704226_pigtr');
//$config->set('dbpass', 'ifc21B17*');


//local
$config->set('dbhost', 'localhost');
$config->set('dbname', 'travel2');
$config->set('dbuser', 'root');
$config->set('dbpass', '');