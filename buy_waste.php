<?php
require_once 'config.php';

$search = $_GET['search'] ?? '';
$query = "SELECT * FROM waste_listings WHERE type LIKE ?";
$stmt = $conn->prepare($query);
$searchTerm = '%' . $search . '%';
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$listings = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Waste</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Buy Waste</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search waste..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>
    <div>
        <?php while ($listing = $listings->fetch_assoc()) { ?>
            <div class="waste-item">
                <h2><?php echo htmlspecialchars($listing['type']); ?></h2>
                <p><strong>Quantity:</strong> <?php echo htmlspecialchars($listing['quantity']); ?></p>
                <p><strong>Quality:</strong> <?php echo htmlspecialchars($listing['quality']); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($listing['location']); ?></p>
                <a href="waste_detail.php?id=<?php echo $listing['id']; ?>">Know More</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
