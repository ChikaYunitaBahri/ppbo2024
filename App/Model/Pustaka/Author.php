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


    public function show(): array
    {
        return [];
    }
}
