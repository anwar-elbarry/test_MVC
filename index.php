<?php
require_once './models/model.php';
require_once './controllers/controller.php';
require_once './views/view.php';

// Database credentials
$host = 'localhost';
$user = 'root';
$password = 'Jppp5734';
$dbname = 'test';

// Initialize the Model
$productModel = new Product($host, $user, $password, $dbname);

// Initialize the Controller
$productController = new ProductController($productModel);

// Handle the request
$productController->handleRequest();
