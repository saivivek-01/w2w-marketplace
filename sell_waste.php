<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $type = $_POST['type'];
    $quality = $_POST['quality'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    
    // Handle image upload
    $image_path = '';
    if (isset($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
        $image_path = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    $stmt = $conn->prepare("INSERT INTO waste_listings (user_id, type, quality, quantity, description, location, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdsss", $user_id, $type, $quality, $quantity, $description, $location, $image_path);

    if ($stmt->execute()) {
        echo "Waste listed successfully!<a href='dashboard.php'>Go back to Dashboard";
    }
     else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Waste</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Sell Waste</h1>
    <form action="sell_waste.php" method="POST" enctype="multipart/form-data">
        <label for="type">Waste Type:</label>
        <input type="text" name="type" id="type" required>

        <label for="quality">Quality:</label>
        <input type="text" name="quality" id="quality" required>

        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image">

        <button type="submit">List Waste</button>
    </form>
</body>
</html>
