<?php

namespace App\Model\Pustaka;

use App\Model\Model;

class Publisher extends Model
{
    public string $id;
    public string $name;
    public string $address;
    public string $phone;

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function save()
    {
        try {
            $stmt = $this->db->prepare("
            INSERT INTO publisher
            (name , address, phone)
            VALUES
            (:name , :address, :phone)
            ");
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':phone', $this->phone);
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
        $publishers = [];
        $model = new Model();
        $db = $model->getDB();
        $stmt = $db->prepare("SELECT * FROM publisher");
        if ($stmt->execute()) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $key => $item) {
                $publishers[$key] = new Publisher();
                $publishers[$key]->id = $item['id'];
                $publishers[$key]->name = $item['name'];
                $publishers[$key]->address = $item['address'];
                $publishers[$key]->phone = $item['phone'];
            }
        } else {
            $publishers = null;
        }
        return $publishers;
    }

    public function detail($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM publisher WHERE id= {$id}");
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
