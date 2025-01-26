<?php
require_once 'config.php';

// Get waste ID from query string
$waste_id = $_GET['id'] ?? null;

if (!$waste_id) {
    echo "Invalid waste ID.";
    exit;
}

// Fetch waste details
$stmt = $conn->prepare("SELECT wl.*, u.name AS seller_name, u.organization_name, u.contact_number, u.address FROM waste_listings wl JOIN users u ON wl.user_id = u.id WHERE wl.id = ?");
$stmt->bind_param("i", $waste_id);
$stmt->execute();
$waste = $stmt->get_result()->fetch_assoc();

if (!$waste) {
    echo "Waste item not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Waste Details</h1>
    <div class="waste-details">
        <h2><?php echo htmlspecialchars($waste['type']); ?></h2>
        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($waste['quantity']); ?></p>
        <p><strong>Quality:</strong> <?php echo htmlspecialchars($waste['quality']); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($waste['description']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($waste['location']); ?></p>
        <p><strong>Seller:</strong> <?php echo htmlspecialchars($waste['seller_name']); ?></p>
        <p><strong>Organization:</strong> <?php echo htmlspecialchars($waste['organization_name']); ?></p>
        <p><strong>Contact:</strong> <?php echo htmlspecialchars($waste['contact_number']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($waste['address']); ?></p>

        <?php if (!empty($waste['image_path'])) { ?>
            <img src="<?php echo htmlspecialchars($waste['image_path']); ?>" alt="Waste Image" width="300">
        <?php } ?>
    </div>
    <a href="buy_waste.php">Back to Listings</a>
</body>
</html>
