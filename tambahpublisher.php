<?php

use App\Model\Pustaka\Publisher;
use App\View;

require_once 'vendor/autoload.php';

$publisher = new Publisher();

$publisher->name = 'Balai Pustaka';
$publisher->address = 'Jl. Ahmad Yani';
$publisher->phone = '080000';
View::json($publisher->save());