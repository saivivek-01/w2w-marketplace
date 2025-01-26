<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user information
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    </header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="sell_waste.php">Sell Waste</a>
        <a href="buy_waste.php">Buy Waste</a>
        <a href="logout.php">Logout</a>
    </nav>
    <main>
        <h2>Profile</h2>
        <form action="update_profile.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            
            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" id="contact_number" value="<?php echo htmlspecialchars($user['contact_number']); ?>" required>
            
            <label for="address">Address:</label>
            <textarea name="address" id="address" required><?php echo htmlspecialchars($user['address']); ?></textarea>
            
            <label for="organization_name">Organization Name:</label>
            <input type="text" name="organization_name" id="organization_name" value="<?php echo htmlspecialchars($user['organization_name']); ?>">
            
            <button type="submit">Update Profile</button>
        </form>
    </main>
</body>
</html>
