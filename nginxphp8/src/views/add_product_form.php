<?php
function displayAddProductForm() {
    echo "<h2>Add New Product</h2>";
    echo "<form method='post' action='index.php'>";
    echo "<input type='text' name='title' placeholder='Enter product title' required>";
    echo "<button type='submit'>Add Product</button>";
    echo "</form>";
}