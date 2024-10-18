<?php
use App\Model\Pustaka\Author;
use App\View;

require_once 'vendor/autoload.php';

$author = new Author();
$author->id = 6;
$author->name = 'Dian Prawira';
$author->description = 'Email: wiraaja@gmail.com';
View::json($author->save());