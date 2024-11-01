<?php

use App\Model\Pustaka\Category;
use App\View;

require_once 'vendor/autoload.php';

$author = new Category();
$id = $_GET['id'];
$author->detail($id);
View::json($author);