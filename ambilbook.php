<?php

use App\Model\Pustaka\Book;
use App\View;

require_once 'vendor/autoload.php';

$authors = Book::all();
View::json($authors);