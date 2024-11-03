<?php

use App\Model\Pustaka\Book;
use App\View;

require_once 'vendor/autoload.php';

$books = Book::all();
View::json($books);