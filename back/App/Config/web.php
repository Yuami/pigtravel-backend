<?php

use Routing\Api;
use Routing\Router;


Router::resource('messagesSent','SendMessagesController');
Router::resource('houses','HouseController');
Router::resource('reservations','ReservationController');
Router::resource('messages','MessagesController');
Router::resource('profile', 'ProfileController');
Router::resource('settings', 'ProfileController');
Router::resource('login', 'LoginController');
Router::resource('support','SupportController');

Router::get('houses/{id}/tarifas', 'TarifasController@show');
Router::post('houses/{id}/tarifas', 'TarifasController@store');
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