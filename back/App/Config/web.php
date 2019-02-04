<?php

use Routing\Api;
use Routing\Router;


Router::resource('messagessent','SendMessagesController');
Router::resource('houses','HouseController');
Router::resource('reservations','ReservationController');
Router::resource('messages','MessagesController');
Router::resource('profile', 'ProfileController');
Router::resource('settings', 'ProfileController');
Router::resource('login', 'LoginController');
Router::resource('support','SupportController');

Router::put('reservations/{id}/oferta', 'ReservationController@oferta');
Router::get('tarifas/{id}', 'TarifasController@show');
Router::delete('tarifas/{id}', 'TarifasController@destroy');
Router::get('politicas/{id}', 'PoliticasController@show');
Router::put('politicas/{id}', 'PoliticasController@update');
Router::delete('politicas/{id}', 'PoliticasController@destroy');
Router::post('politicas/{id}', 'PoliticasController@store');
Router::put('tarifas/{id}', 'TarifasController@update');
Router::post('houses/{id}', 'TarifasController@store');
Router::get('','IndexController@index');
Router::get('logout', 'LoginController@destroy');
Router::get('register', 'RegisterController@index');
Router::post('register', 'RegisterController@store');

Router::view('support', 'support');
Router::view('notifications', 'notifications');
Router::view('premium', 'premium');

Api::get('paises', 'PaisesController@index');
Api::get('region/{id}', 'RegionController@show');
Api::get('ciudades', 'CiudadesController@index');
Api::get('ciudades/{id}', 'CiudadesController@show');
Api::post('mailreceiver', 'MailReceiverController@create');

// THIS IS TESTING AREA
Router::view('photos', 'photo');
Router::view('test', 'test');
Router::post('upload', 'UploadController@store');
Router::post('upload/house/{id}', 'UploadController@house');
Router::post('upload/profile/{id}', 'UploadController@profile');

//Router::view('test', 'test');