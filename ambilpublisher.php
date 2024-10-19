<?php

use App\Model\Pustaka\Publisher;
use App\View;

require_once 'vendor/autoload.php';

$publishers = Publisher::all();
View::json($publishers);
