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
            $status = $stmt->execute();

            $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
            $last_id = $stmt->fetchColumn();

            $result = [
                'status'=> $status,
                'id'=> $last_id
            ];
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

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM author WHERE id= {$id}");
        if ($stmt->execute()) {
            $author = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->id = $author['id'];
            $this->name = $author['name'];
            $this->description = $author['description'];
        } else {
            $author = null;
        }
    }

    public function show(): array
    {
        return [];
    }
}
