<?php
$servername = "db";
$username = "w2wuser";
$password = "w2wpass";
$dbname = "w2w_marketplace";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
