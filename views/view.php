<?php
class ProductView {
    public function render($products, $message = '') {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Product List</title>
            <style>
                table {
                    width: 80%;
                    border-collapse: collapse;
                    margin: 20px auto;
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: center;
                }
                th {
                    background-color: #f4f4f4;
                }
            </style>
        </head>
        <body>
            <h1 style='text-align:center;'>Product List</h1>";
    
            // Display message if there is one
            if ($message) {
                echo "<p style='text-align:center; color: green;'>$message</p>";
            }
    
            // New product form
            echo "<h2>Add New Product</h2>
            <form method='POST' action='index.php'>
                <label for='nom'>Name:</label>
                <input type='text' id='nom' name='nom' required><br><br>
                <label for='description'>Description:</label>
                <input type='text' id='description' name='description' required><br><br>
                <label for='prix'>Price:</label>
                <input type='number' id='prix' name='prix' required><br><br>
                <button type='submit' name='action' value='create'>Add Product</button>
            </form>";
    
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>ACTIONS</th>
                </tr>";
    
            foreach ($products as $product) {
                echo "<tr>
                    <td>{$product['id']}</td>
                    <td>{$product['nom']}</td>
                    <td>{$product['description']}</td>
                    <td>{$product['prix']}</td>
                   <td> <form method='POST' action='index.php'>
                            <input type='hidden' name='delete_id' value='{$product['id']}'>
                            <button type='submit'>Delete</button>
                        </form>
                        </td>
                </tr>";
            }
    
            echo "</table>
            </body>
            </html>";
    }
    
}
