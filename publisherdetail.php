<?php

use App\Model\Pustaka\Publisher;
use App\View;

require_once 'vendor/autoload.php';

$publisher = new Publisher();
$publisher->detail(7); 
View::json($publisher);
