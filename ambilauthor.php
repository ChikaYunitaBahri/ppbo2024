<?php

use App\Model\Pustaka\Author;
use App\View;

require_once 'vendor/autoload.php';

$authors = Author::all();
View::json($authors);