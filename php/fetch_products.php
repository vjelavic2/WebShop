<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web-shop";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, description, price, image, type FROM products";
$result = $conn->query($sql);

$products = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo json_encode([]);
    exit();
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($products);
?>
