<?php

use App\Model\Pustaka\Author;
use App\View;

require_once 'vendor/autoload.php';

$author = new Author();
$id = $_GET['id'];
$author->detail($id);
View::json($author);