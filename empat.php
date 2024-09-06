<?php
require_once 'Author.php';
require_once 'Book.php';
require_once 'Publisher.php';

// Contoh penggunaan
$author = new Author("Tere Liye", "Penulis terkenal Indonesia yang produktif dan banyak menulis novel populer.");
$publisher = new Publisher("Gramedia Pustaka Utama", "Jakarta, Indonesia", 123456789);

$book = new Book(987654321, "Hujan", "Novel yang menceritakan tentang cinta dan pengorbanan di tengah bencana alam", "Fiction", "Indonesian", 320, $author->name, $publisher->name);

echo "Informasi Penulis:\n";
print_r($author->show('all'));

echo "\nInformasi Penerbit:\n";
echo "Nama: " . $publisher->name . "\n";
echo "Alamat: " . $publisher->address . "\n";
echo "Telepon: " . $publisher->getPhone() . "\n";

echo "\nInformasi Buku:\n";
print_r($book->showAll());

?>
