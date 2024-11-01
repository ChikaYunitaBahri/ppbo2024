<?php

use App\Model\Pustaka\Author;
use App\View;

require_once 'vendor/autoload.php';

$author = new Author();
$author->id = $_POST['id'];
$author->name = $_POST['name'];
$author->description = $_POST['description'];
View::json($author->save());
