<?php

class Author
{
    public $name;
    public $description;

    public function __construct($name, $description) {
        $this->name = $name;
        $this->description = $description;
    }

    public function show($type): array {
        if ($type === 'name') {
            return ['name' => $this->name];
        } elseif ($type === 'description') {
            return ['description' => $this->description];
        } else {
            return [
                'name' => $this->name,
                'description' => $this->description
            ];
        }
    }
}

class Book
{
    public $ISBN;
    public $title;
    public $description;
    public $category;
    public $language;
    public $numberOfPage;
    public $author;
    public $publisher;

    public function __construct($ISBN, $title, $description, $category, $language, $numberOfPage, $author, $publisher) {
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->language = $language;
        $this->numberOfPage = $numberOfPage;
        $this->author = $author;
        $this->publisher = $publisher;
    }

    public function showAll(): array {
        return [
            'ISBN' => $this->ISBN,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'language' => $this->language,
            'numberOfPage' => $this->numberOfPage,
            'author' => $this->author,
            'publisher' => $this->publisher
        ];
    }

    public function detail($ISBN): array {
        if ($this->ISBN == $ISBN) {
            return $this->showAll();
        } else {
            return [];
        }
    }
}

class Publisher
{
    public $name;
    public $address;
    private $phone;

    public function __construct($name, $address, $phone) {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function setPhone(int $phone): void {
        $this->phone = $phone;
    }

    public function getPhone(): int {
        return $this->phone;
    }
}

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
