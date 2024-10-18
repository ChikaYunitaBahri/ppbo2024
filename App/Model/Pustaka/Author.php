<?php

namespace App\Model\Pustaka;

use App\Model\Model;

class Author extends Model
{
    public int $id;
    public string $name;
    public string $description;

    public function save()
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO author (id, name , description) VALUES (:id, :name, :description)");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':description', $this->description);
            $result = $stmt->execute();
        } catch (\PDOException $e) {
            http_response_code(500);
            $result = ["message" => $e->getMessage()];
        }
        return $result;
    }

    public static function all(): array
    {
        $authors = [];
        $model = new Model();
        $db = $model->getDB();
        $stmt = $db->prepare("SELECT * FROM author");
        if ($stmt->execute()) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $key => $item) {
                $authors[$key] = new Author();
                $authors[$key]->id = $item['id'];
                $authors[$key]->name = $item['name'];
                $authors[$key]->description = $item['description'];

            }
        } else {
            $authors = null;
        }
        return $authors;
    }

    public function show(): array
    {
        return [];
    }
}
