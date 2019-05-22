<?php

use Config\Config;

// TODO: Errors only on dev
error_reporting(E_ERROR | E_PARSE);

$config = Config::singleton();

//server
$config->set('dbhost', 'localhost');
$config->set('dbname', 'travel2');
$config->set('dbuser', 'jfornes');
$config->set('dbpass', 'tfff01');


//local
// $config->set('dbhost', 'localhost');
// $config->set('dbname', 'travel');
// $config->set('dbuser', 'root');
// $config->set('dbpass', '');
