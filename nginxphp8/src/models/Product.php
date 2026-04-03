<?php
class Product {
    public $conn;

    public function __construct() {
        $user = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');
        $database = getenv('DB_NAME');
        $port = getenv('DB_PORT');

        $this->conn = mysqli_connect('database_robtesting', $user, $password, $database, $port);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $sql);
        $products = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }

    public function create($title) {
        $title = mysqli_real_escape_string($this->conn, $title);
        $sql = "INSERT INTO products (title) VALUES ('$title')";

        return mysqli_query($this->conn, $sql);
    }

    public function delete($id) {
        $id = mysqli_real_escape_string($this->conn, $id);
        $sql = "DELETE FROM products WHERE id = $id";

        return mysqli_query($this->conn, $sql);
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}