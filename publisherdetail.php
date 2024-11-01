<?php

use App\Model\Pustaka\Author;
use App\Model\Pustaka\Publisher;
use App\View;

require_once 'vendor/autoload.php';

$publisher = new Publisher();
$publisher->detail(2);
View::json($publisher);