<?php

use Config\Api;
use Routing\Router;

Router::resource('houses','HouseController');
Router::resource('reservations','ReservationController');
Router::resource('messages','MessagesController');
Router::resource('messagesSent','SendMessagesController');
Router::resource('profile', 'ProfileController');
Router::resource('settings', 'ProfileController');
Router::resource('login', 'LoginController');

Router::get('','IndexController@index');
Router::get('logout', 'LoginController@destroy');
Router::get('register', 'RegisterController@index');
Router::post('register', 'RegisterController@store');

Router::view('support', 'support');
Router::view('notifications', 'notifications');

// THIS IS TESTING AREA
Router::view('photos', 'photo');
Api::resource('test}', 'DummyController');
