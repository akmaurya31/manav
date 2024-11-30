<?php
include('dbconn.php'); // Database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$productId = $_REQUEST['id']; // Get the product ID from the request

// Validate and sanitize the product ID (ensure it is an integer)
$productId = filter_var($productId, FILTER_VALIDATE_INT);

if (!$productId) {
    echo json_encode(['success' => false, 'error' => 'Invalid product ID']);
    exit;
}

// Construct the DELETE SQL query
$sql = "DELETE FROM products WHERE id = $productId";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

// Close the connection
$conn->close();
?>
