<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $organization_name = $_POST['organization_name'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, contact_number, address, organization_name, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $password, $contact_number, $address, $organization_name, $role);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php'>Login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - W2W Marketplace</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Register</h1>
    <form action="register.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" id="contact_number" required>
        
        <label for="address">Address:</label>
        <textarea name="address" id="address" required></textarea>
        
        <label for="organization_name">Organization Name (if applicable):</label>
        <input type="text" name="organization_name" id="organization_name">
        
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="individual">Individual</option>
            <option value="business">Business</option>
        </select>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
