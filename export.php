<?php
 include("dbConnection.php");  // Include the database connection

// Define the file name and set headers for CSV
$filename = "user_list_" . date('Ymd') . ".csv";
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv;");

// Open output stream
$output = fopen("php://output", "w");

// Write the column headers in the CSV
fputcsv($output, array(
    'ID', 'Name', 'Email', 'Mobile', 'Password', 'City', 'State', 
    'Your Business', 'Role', 'Pay', 'Pay Date', 'Current Balance', 
    'Transaction ID', 'Currency', 'Paid', 'Payment Status', 
    'End Date', 'Created At', 'Updated At'
));

// Fetch all user records from the users table
$sql = "SELECT id, name, email, mobile, password, city, state, yourbusiness, role, 
        pay, pay_date, current_balance, transaction_id, pcurrency, paid, pstatus, 
        edate, created_at, updated_at 
        FROM users";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Output each row of the result as a CSV row
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    echo "No records found.";
}

// Close the output stream and database connection
fclose($output);
$mysqli->close();
exit;
?>
