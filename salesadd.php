<?php
include('dbconn.php'); // Database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a new sales team member is being added
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['status'])) {
    // Retrieve the sales team member details from POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // Ensure this is hashed before storing in a real application
    $status = $_POST['status'];

    // SQL query to insert a new sales team member
    $insertSql = "INSERT INTO sales_team (name, email, password, status) VALUES ('$name', '$email', '$password', '$status')";

    if (mysqli_query($conn, $insertSql)) {
        // If insert is successful, return success response
        echo json_encode(['message' => 'Salesperson added successfully']);
    } else {
        // If there's an error, return error response
        echo json_encode(['error' => 'Failed to add salesperson']);
    }
}

// SQL query to fetch all sales team members
$sql = "SELECT * FROM sales_team";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Create an array to hold the salespeople
    $salespeople = [];

    // Fetch all rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $salespeople[] = $row;
    }

    // Return the salespeople as JSON
    echo json_encode($salespeople);
} else {
    echo json_encode([]);
}

// Close the connection
$conn->close();
?>
