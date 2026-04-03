
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
