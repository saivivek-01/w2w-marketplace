<?php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

// Fetch users and listings
$users = $conn->query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);
$listings = $conn->query("SELECT * FROM waste_listings")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['contact_number']); ?></td>
                <td><?php echo htmlspecialchars($user['address']); ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Waste Listings</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Quality</th>
            <th>Seller</th>
        </tr>
        <?php foreach ($listings as $listing) { ?>
            <tr>
                <td><?php echo $listing['id']; ?></td>
                <td><?php echo htmlspecialchars($listing['type']); ?></td>
                <td><?php echo htmlspecialchars($listing['quantity']); ?></td>
                <td><?php echo htmlspecialchars($listing['quality']); ?></td>
                <td><?php echo htmlspecialchars($listing['user_id']); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
