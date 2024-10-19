<?php

use App\Model\Pustaka\Publisher;
use App\View;

require_once 'vendor/autoload.php';

$publisher = new Publisher();
$publisher->id = 5; 
$publisher->name = 'Pustaka Publisher'; 
$publisher->address = 'Pustaka Publisher bertempat di Pontianak'; 
$publisher->phone = '0812-4563-7839'; 
View::json($publisher->save());
