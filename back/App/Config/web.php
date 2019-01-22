<?php

use Routing\Api;
use Routing\Router;

Router::resource('houses','HouseController');
Router::resource('reservations','ReservationController');
Router::resource('messages','MessagesController');
Router::resource('messagesSent','SendMessagesController');
Router::resource('profile', 'ProfileController');
Router::resource('settings', 'ProfileController');
Router::resource('login', 'LoginController');
Router::resource('support','SupportController');

Router::get('tarifas/{id}', 'TarifasController@show');
Router::post('houses/{id}', 'TarifasController@store');
Router::get('','IndexController@index');
Router::get('logout', 'LoginController@destroy');
Router::get('register', 'RegisterController@index');
Router::post('register', 'RegisterController@store');

Router::view('support', 'support');
Router::view('notifications', 'notifications');
Router::view('premium', 'premium');

// THIS IS TESTING AREA
Router::view('photos', 'photo');
Router::get('test', 'RegisterController@store');

Api::get('paises', 'PaisesController@index');
Api::get('region/{id}', 'RegionController@show');
Api::get('ciudades/{id}', 'CiudadesController@show');

//Router::view('test', 'test');