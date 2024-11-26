<?php
include('dbconn.php'); // Database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$productId = $_REQUEST['id']; // Get the product ID from the request
$productName = $_REQUEST['name']; // Get the new product name from the request
$productCode = $_REQUEST['code']; // Get the new product code from the request
$productStatus = $_REQUEST['status']; // Get the new product status from the request

// SQL query to update the product details by ID
$sql = "UPDATE products SET product_name = ?, product_code = ?, status = ? WHERE id = ?";

// Prepare the SQL statement
if ($stmt = $conn->prepare($sql)) {
    // Bind the parameters to the prepared statement
    $stmt->bind_param("sssi", $productName, $productCode, $productStatus, $productId); 
    // "ssii" - string for productName and productCode, integer for productStatus and productId

    // Execute the statement
    if ($stmt->execute()) {
        // If update is successful, return success message
        echo json_encode(['message' => 'Product updated successfully']);
    } else {
        // If there’s an error with the update
        echo json_encode(['error' => 'Failed to update product']);
    }

    // Close the statement
    $stmt->close();
} else {
    // If there’s an error with preparing the statement
    echo json_encode(['error' => 'Failed to prepare statement']);
}

// Close the connection
$conn->close();
?>
