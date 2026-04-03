
<?php
require_once __DIR__ . '/models/Product.php';
require_once __DIR__ . '/views/products_table.php';
require_once __DIR__ . '/views/add_product_form.php';

// Initialize product model
$productModel = new Product();

// Handle form submissions
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle delete
    if (isset($_POST['delete']) && isset($_POST['delete_id'])) {
        if ($productModel->delete($_POST['delete_id'])) {
            $message = 'Product deleted successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error deleting product: ' . mysqli_error($productModel->conn);
            $messageType = 'error';
        }
    }

    // Handle insert
    if (isset($_POST['title'])) {
        if ($productModel->create($_POST['title'])) {
            $message = 'Product added successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error adding product: ' . mysqli_error($productModel->conn);
            $messageType = 'error';
        }
    }
}

// Get all products
$products = $productModel->getAll();

// Display messages
if ($message) {
    echo "<p style='color: " . ($messageType === 'success' ? 'green' : 'red') . ";'>" . htmlspecialchars($message) . "</p>";
}

// Display views
displayProductsTable($products);
displayAddProductForm();
