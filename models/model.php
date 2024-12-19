<?php
class Product {
    private $db;

    public function __construct($host, $user, $password, $dbname) {
        $this->db = new mysqli($host, $user, $password, $dbname);

        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function getAllProducts() {
        $query = "SELECT * FROM produits";
        $result = $this->db->query($query);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        return $products;
    }
    public function deleteProduct($id) {
        $query = "DELETE FROM produits WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createProduct($nom, $description, $prix) {
        $query = "INSERT INTO produits (nom, description, prix) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi', $nom, $description, $prix);
        return $stmt->execute();
    }
    
}
