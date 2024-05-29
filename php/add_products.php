<?php
include('server.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($image);

    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $error_message = "Error uploading image. Error code: " . $_FILES['image']['error'];
        header("Location: add_products.html?error=" . urlencode($error_message));
        exit();
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $query = "INSERT INTO products (type, name, description, price, image, liked) VALUES ('$type', '$name', '$description', '$price', '$target_file', 0)";
            if (mysqli_query($db, $query)) {
                $success_message = "Product added successfully";
                header("Location: add_products.html?success=" . urlencode($success_message));
                exit();
            } else {
                $error_message = "Error: " . mysqli_error($db);
                header("Location: add_products.html?error=" . urlencode($error_message));
                exit();
            }
        } else {
            $error_message = "Error moving uploaded file.";
            header("Location: add_products.html?error=" . urlencode($error_message));
            exit();
        }
    }
}
?>
