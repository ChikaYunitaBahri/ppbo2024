<?php

use App\Model\Pustaka\Book;
use App\View;

require_once 'vendor/autoload.php';

$book = new Book();
$book->id = $_POST['id'];
$book->isbn = $_POST['isbn'];
$book->title = $_POST['title'];
$book->description = $_POST['description'];
$book->language = $_POST['language'];
$book->numberOfPage = $_POST['numberOfPage'];
$book->category_id = $_POST['category_id'];
$book->publisher_id = $_POST['publisher_id'];
$book->author_id = $_POST['author_id'];
View::json($book->save());
