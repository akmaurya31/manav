<?php
include('dbconn.php'); // Include the database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from the request
$salesPersonId = $_REQUEST['id']; // ID of the sales team member
$name = $_REQUEST['name']; // Updated name
$email = $_REQUEST['email']; // Updated email
$password = $_REQUEST['password']; // Updated password
$status = $_REQUEST['status']; // Updated status
$edit_teamtype = $_REQUEST['edit_teamtype']; // Updated status



// Prepare the SQL query to update the sales team member
$sql = "UPDATE sales_team SET name = '$name', email = '$email', password = '$password', status = '$status', teamtype = '$edit_teamtype' WHERE id = $salesPersonId";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Sales person updated successfully']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to update sales person']);
}

// Close the database connection
$conn->close();
?>