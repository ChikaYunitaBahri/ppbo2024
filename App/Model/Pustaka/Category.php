<?php

namespace App\Model\Pustaka;

use App\Model\Model;

class Category extends Model
{
    public int $id;
    public string $name;
    public string $description;

    public function save()
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO category (id, name , description) VALUES (:id, :name, :description)");
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
        $categories = [];
        $model = new Model();
        $db = $model->getDB();
        $stmt = $db->prepare("SELECT * FROM category");
        if ($stmt->execute()) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $key => $item) {
                $categories[$key] = new Category();
                $categories[$key]->id = $item['id'];
                $categories[$key]->name = $item['name'];
                $categories[$key]->description = $item['description'];
            }
        } else {
            $categories = null;
        }
        return $categories;
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM category WHERE id= {$id}");
        if ($stmt->execute()) {
            $category = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->id = $category['id'];
            $this->name = $category['name'];
            $this->description = $category['description'];
        } else {
            $category = null;
        }
    }

    public function show(): array
    {
        return [];
    }
}
