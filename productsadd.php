<?php
include('dbconn.php'); // Database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle product addition (via POST)
//if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productName'], $_POST['productCode'], $_POST['status'])) {
    // Retrieve the data from the POST request
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productCode = mysqli_real_escape_string($conn, $_POST['productCode']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // SQL query to insert a new product
    $insertSql = "INSERT INTO products (product_name, product_code, status) VALUES ('$productName', '$productCode', '$status')";

    if (mysqli_query($conn, $insertSql)) {
        // Success response
        echo json_encode(['message' => 'Product added successfully']);
    } else {
        // Error response
        echo json_encode(['error' => 'Failed to add product']);
    }
    exit;
//}

// Fetch all products (via GET)
$sql = "SELECT id, product_name, product_code, status FROM products";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Create an array to hold the products
    $products = [];

    // Fetch all rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Return the products as JSON
    echo json_encode($products);
} else {
    // Return an empty array if no products are found
    echo json_encode([]);
}

// Close the connection
$conn->close();
?>
