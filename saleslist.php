<?php
include('dbconn.php'); // Database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch all sales list data
$sql = "SELECT * FROM sales_team";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Create an array to hold the sales list data
    $salesList = [];

    // Fetch all rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $salesList[] = $row;
    }

    // Return the sales list data as JSON
    echo json_encode($salesList);
} else {
    echo json_encode([]); // No sales records found
}

// Close the connection
$conn->close();
?>
