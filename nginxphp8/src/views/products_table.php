<?php
function displayProductsTable($products) {
    echo "<h2>Products</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Title</th><th>Created At</th><th>Action</th></tr>";

    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($product['id']) . "</td>";
        echo "<td>" . htmlspecialchars($product['title']) . "</td>";
        echo "<td>" . htmlspecialchars($product['created_at']) . "</td>";
        echo "<td>";
        echo "<form method='post' action='index.php' style='display:inline;'>";
        echo "<input type='hidden' name='delete_id' value='" . htmlspecialchars($product['id']) . "'>";
        echo "<button type='submit' name='delete' value='1' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
}