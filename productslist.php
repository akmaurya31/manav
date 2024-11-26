<?php
include('dbconn.php');

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 

// SQL query to fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Create an array to hold the products
    $products = [];

    // Fetch all rows and store them in the array
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Return the products as JSON
    echo json_encode($products);
} else {
    echo json_encode([]);
}

// Close the connection
$conn->close();
?>
