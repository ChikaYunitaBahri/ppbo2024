<?php

use App\Model\Pustaka\Category;
use App\View;

require_once 'vendor/autoload.php';

$category = new Category();
$category->id = $_POST['id'];
$category->name = $_POST['name'];
$category->description = $_POST['description'];
View::json($category->save());