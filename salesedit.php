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

// Prepare the SQL query to update the sales team member
$sql = "UPDATE sales_team SET name = ?, email = ?, password = ?, status = ? WHERE id = ?";

if ($stmt = $conn->prepare($sql)) {
    // Bind parameters (s = string, i = integer)
    $stmt->bind_param("ssssi", $name, $email, $password, $status, $salesPersonId);

    // Execute the statement
    if ($stmt->execute()) {
        // If the update was successful
        echo json_encode(['success' => true, 'message' => 'Sales person updated successfully']);
    } else {
        // If the update failed
        echo json_encode(['success' => false, 'error' => 'Failed to update sales person']);
    }

    // Close the statement
    $stmt->close();
} else {
    // If preparing the statement failed
    echo json_encode(['success' => false, 'error' => 'Failed to prepare SQL statement']);
}

// Close the database connection
$conn->close();
?>