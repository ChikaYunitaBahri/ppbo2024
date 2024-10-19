<?php

namespace App\Model\Pustaka;

use App\Model\Model;

class Publisher extends Model
{
    public int $id;
    public string $name;
    public string $address;
    public string $phone;

    public function save()
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO publisher (id, name, address, phone) VALUES (:id, :name, :address, :phone)");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':phone', $this->phone);
            $result = $stmt->execute();
        } catch (\PDOException $e) {
            http_response_code(500);
            $result = ["message" => $e->getMessage()];
        }
        return $result;
    }
    
    public static function all(): array
    {
        $publishers = [];
        $model = new Model();
        $db = $model->getDB();
        $stmt = $db->prepare("SELECT * FROM publisher");
        if ($stmt->execute()) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $item) {
                $publishers[] = new Publisher($item['id'], $item['name'], $item['address'], $item['phone']);
            }
        } else {
            $publishers = null;
        }
        return $publishers;
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM publisher WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $publisher = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->id = $publisher['id'];
            $this->name = $publisher['name'];
            $this->address = $publisher['address'];
            $this->phone = $publisher['phone'];
        } else {
            $publisher = null;
        }
    }
}
