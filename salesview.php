<?php
include('dbconn.php'); // Database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 

 
    $productId = $_REQUEST['id']; // Get the product ID from the request

    // SQL query to fetch product by ID
    $sql = "SELECT * FROM sales_team WHERE id = ?";
    
    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the product ID to the prepared statement
        $stmt->bind_param("i", $productId);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if the product exists
        if ($result->num_rows > 0) {
            // Fetch the product as an associative array
            $product = $result->fetch_assoc();

            // Return the product as JSON
            echo json_encode($product);
        } else {
            // If product not found, return an error message
            echo json_encode(['error' => 'Product not found']);
        }

        // Close the statement
        $stmt->close();
    } else {
        // If there’s an error with the SQL statement
        echo json_encode(['error' => 'Failed to prepare statement']);
    }
 

// Close the connection
$conn->close();
?>
