<?php
use App\Model\Pustaka\Author;
use App\View;

require_once 'vendor/autoload.php';

$author = new Author();
$author->id = 12;
$author->name = 'Chika Yunita Bahri';
$author->description = 'Chika Yunita Bahri adalah seorang author pemula';
View::json($author->save());