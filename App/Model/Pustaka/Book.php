<?php

namespace App\Model\Pustaka;

use App\Model\Model;

class Book extends Model
{
    public int $id;
    public string $isbn;
    public string $title; 
    public string $description;
    public string $language;
    public int $numberOfPage;
    public int $category_id;
    public int $publisher_id;
    public int $author_id;

    public ?string $categoryName;  
    public ?string $publisherName;
    public ?string $authorName;

    public function save()
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("INSERT INTO book (isbn, title, description, language, numberOfPage, category_id, publisher_id) 
                                        VALUES (:isbn, :title, :description, :language, :numberOfPage, :category_id, :publisher_id)");
            $stmt->bindParam(':isbn', $this->isbn);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':language', $this->language);
            $stmt->bindParam(':numberOfPage', $this->numberOfPage);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':publisher_id', $this->publisher_id);
            $status = $stmt->execute();

            $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
            $last_id = $stmt->fetchColumn();
            $this->id = $last_id;

            $stmt = $this->db->prepare("INSERT INTO book_author (book_id, author_id) VALUES (:book_id, :author_id)");
            $stmt->bindParam(':book_id', $this->id);
            $stmt->bindParam(':author_id', $this->author_id);
            $stmt->execute();

            $this->db->commit();

            $result = [
                'status' => $status,
                'id' => $this->id
            ];

        } catch (\PDOException $e) {
            $this->db->rollBack();
            http_response_code(500);
            $result = ["message" => $e->getMessage()];
        }
        return $result;
    }

    public static function all(): array
    {
        $books = [];
        $model = new Model();
        $db = $model->getDB();

        $stmt = $db->prepare("SELECT book.*, 
                category.name AS categoryName,
                publisher.name AS publisherName,
                author.name AS authorName
                FROM book
                LEFT JOIN category ON category.id = book.category_id
                LEFT JOIN publisher ON publisher.id = book.publisher_id
                LEFT JOIN book_author ON book_author.book_id = book.id
                LEFT JOIN author ON author.id = book_author.author_id");

        if ($stmt->execute()) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $item) {
                $book = new Book();
                $book->id = $item['id'];
                $book->isbn = $item['isbn'];
                $book->title = $item['title'];
                $book->description = $item['description'];
                $book->language = $item['language'];
                $book->numberOfPage = $item['numberOfPage'];
                $book->category_id = $item['category_id'];
                $book->categoryName = $item['categoryName'];
                $book->publisher_id = $item['publisher_id'];
                $book->publisherName = $item['publisherName'];
                $book->authorName = $item['authorName'];
                $books[] = $book;
            }
        } else {
            $books = null;
        }
        return $books;
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT book.*, 
            category.id AS category_id, category.name AS categoryName,
            publisher.id AS publisher_id, publisher.name AS publisherName,
            author.name AS authorName
            FROM book
            LEFT JOIN category ON category.id = book.category_id
            LEFT JOIN publisher ON publisher.id = book.publisher_id
            LEFT JOIN book_author ON book_author.book_id = book.id
            LEFT JOIN author ON author.id = book_author.author_id
            WHERE book.id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $book = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->id = $book['id'];
            $this->isbn = $book['isbn'];
            $this->title = $book['title'];
            $this->description = $book['description'];
            $this->language = $book['language'];
            $this->numberOfPage = $book['numberOfPage'];
            $this->category_id = $book['category_id'];
            $this->categoryName = $book['categoryName'];
            $this->publisher_id = $book['publisher_id'];
            $this->publisherName = $book['publisherName'];
            $this->authorName = $book['authorName'];
        } else {
            return null;
        }
    }

    public function show(): array
    {
        return [];
    }
}
