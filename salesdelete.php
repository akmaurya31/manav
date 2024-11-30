<?php
include('dbconn.php'); // Include the database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ID of the sales team member to delete
$salesPersonId = $_REQUEST['id'];

// Validate and sanitize the ID (Ensure it is an integer)
$salesPersonId = filter_var($salesPersonId, FILTER_VALIDATE_INT);

if (!$salesPersonId) {
    echo json_encode(['success' => false, 'error' => 'Invalid ID']);
    exit;
}

// Construct the SQL query directly
$sql = "DELETE FROM sales_team WHERE id = $salesPersonId";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Sales person deleted successfully']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to delete sales person']);
}

// Close the database connection
$conn->close();
?>
