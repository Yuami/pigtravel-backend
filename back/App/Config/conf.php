<?php

use Config\Config;

// TODO: Errors only on dev
//Config::errorsOn();

$config = Config::singleton();

//server
// $config->set('dbhost', 'localhost');
// $config->set('dbname', 'travel2');
// $config->set('dbuser', 'jfornes');
// $config->set('dbpass', 'tfff01');

//
$config->set('dbhost', 'localhost');
$config->set('dbname', 'travel2');
$config->set('dbuser', 'root');
$config->set('dbpass', '');