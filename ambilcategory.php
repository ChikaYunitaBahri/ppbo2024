<?php

use App\Model\Pustaka\Category;
use App\View;

require_once 'vendor/autoload.php';

$authors = Category::all();
View::json($authors);