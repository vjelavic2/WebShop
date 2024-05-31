<?php
$db = mysqli_connect('localhost', 'root', '', 'web-shop');

$query = "SELECT * FROM products";
$result = mysqli_query($db, $query);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($products);
?>
