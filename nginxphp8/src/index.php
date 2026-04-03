
<?php
// Pull variables from environment variables
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = getenv('DB_PORT');

// Connect using IP and specific port for MySQL 8
$conn = mysqli_connect('database_robtesting', $user, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Query and display products
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

echo "<h2>Products</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title</th><th>Created At</th><th>Action</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
    echo "<td>";
    echo "<form method='post' action='index.php' style='display:inline;'>";
    echo "<input type='hidden' name='delete_id' value='" . htmlspecialchars($row['id']) . "'>";
    echo "<button type='submit' name='delete' value='1' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle delete
    if (isset($_POST['delete']) && isset($_POST['delete_id'])) {
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
        $sql = "DELETE FROM products WHERE id = $delete_id";

        if (mysqli_query($conn, $sql)) {
            echo "<p style='color: green;'>Product deleted successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error deleting product: " . mysqli_error($conn) . "</p>";
        }
    }

    // Handle insert
    if (isset($_POST['title'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $sql = "INSERT INTO products (title) VALUES ('$title')";

        if (mysqli_query($conn, $sql)) {
            echo "<p style='color: green;'>Product added successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error adding product: " . mysqli_error($conn) . "</p>";
        }
    }
}

// Display add product form
echo "<h2>Add New Product</h2>";
echo "<form method='post' action='index.php'>";
echo "<input type='text' name='title' placeholder='Enter product title' required>";
echo "<button type='submit'>Add Product</button>";
echo "</form>";

// Close connection
mysqli_close($conn);
