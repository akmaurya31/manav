<?php
// Connect to your MySQL database
require_once("dbConnection.php");

// Check if 'uid' is set in $_POST
if(isset($_POST['uid'])) {
    // Sanitize user input to prevent SQL injection
    $uid = $mysqli->real_escape_string($_POST['uid']);

    // SQL query to fetch all users
    $sql = "SELECT * FROM users WHERE id='$uid'";
    $result = $mysqli->query($sql);

    // Check if query was successful
    if ($result) {
        // Convert result to associative array
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Return JSON encoded data
        echo json_encode($data[0]);
    } else {
        // Query failed
        echo json_encode(array('error' => 'Query failed'));
    }

    // Close database connection
    $mysqli->close();
} else {
    // 'uid' is not set in $_POST
    echo json_encode(array('error' => 'User ID not provided'));
}
?>
