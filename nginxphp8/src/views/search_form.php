<?php
function displaySearchForm() {
    echo "<h2>Search Products</h2>";
    echo "<form method='get' action='index.php'>";
    echo "<input type='text' name='search' placeholder='Search by title' required>";
    echo "<button type='submit'>Search</button>";
    echo "</form>";
}