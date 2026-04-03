<?php
// Connect using IP and specific port for MySQL 8
$conn = mysqli_connect('database_robtesting', 'user', 'password', 'deniseforum', '3306');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>