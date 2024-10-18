<?php

use App\Model\Pustaka\Author;
use App\View;

require_once 'vendor/autoload.php';

$author = new Author();
$author->detail(6);
View::json($author);