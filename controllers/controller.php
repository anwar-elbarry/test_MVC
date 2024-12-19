<?php
require_once 'models/model.php';

class ProductController {
    private $model;

    public function __construct(Product $model) {
        $this->model = $model;
    }

    public function getProducts() {
        return $this->model->getAllProducts();
    }

    public function deleteProduct($id) {
        return $this->model->deleteProduct($id);
    }

    public function createProduct($nom, $description, $prix) {
        if ($this->model->createProduct($nom, $description, $prix)) {
            return "Product added successfully!";
        } else {
            return "Failed to add product.";
        }
    }
    
    public function handleRequest() {
        // Handle delete product
        if (isset($_POST['delete_id'])) {
            $deleteId = (int) $_POST['delete_id'];
            $message = $this->deleteProduct($deleteId) ? "Product deleted successfully!" : "Failed to delete product.";
        }
        // Handle create product
        elseif (isset($_POST['action']) && $_POST['action'] === 'create') {
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $message = $this->createProduct($nom, $description, $prix);
        }
    
        // Fetch updated products and render the view
        $products = $this->getProducts();
        $productView = new ProductView();
        $productView->render($products, $message);
    }
    
    
}
