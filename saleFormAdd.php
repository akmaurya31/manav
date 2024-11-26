<?php
// Insert data into the table

include('dbconn.php');

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Print request method for debugging
//  print_r($_POST); die("Asf");

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    // Use null coalescing operator to handle missing values
    $religion = $conn->real_escape_string($_POST['religion'] ?? "");
    $name = $conn->real_escape_string($_POST['name'] ?? "");
    $phone = $conn->real_escape_string($_POST['phone'] ?? "");
    $email = $conn->real_escape_string($_POST['email'] ?? "");
    $location = $conn->real_escape_string($_POST['location'] ?? "");
    $business = $conn->real_escape_string($_POST['business'] ?? "");
    $product = $conn->real_escape_string($_POST['product'] ?? "");
    $seller = $conn->real_escape_string($_POST['seller'] ?? "");
    $payment_type = $conn->real_escape_string($_POST['paymentType'] ?? "");
    $payment_mode = $conn->real_escape_string($_POST['paymentMode'] ?? "");
    $amount_paid = floatval($_POST['paid'] ?? 0);
    $amount_pending = floatval($_POST['pending'] ?? 0);
    $tickets = intval($_POST['tickets'] ?? 0);
    $remark = $conn->real_escape_string($_POST['remark'] ?? "");
    $payment_id = $conn->real_escape_string($_POST['paymentID'] ?? "");

    $gst_applicable = $conn->real_escape_string($_POST['gst_applicable'] ?? "");
    $gst_percentage = $conn->real_escape_string($_POST['gst_percentage'] ?? "");
    $gst_amount = $conn->real_escape_string($_POST['gst_amount'] ?? "");

    // Handle file upload
    $screenshot_path = null;
    if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $screenshot_path = $upload_dir . basename($_FILES['screenshot']['name']);
        move_uploaded_file($_FILES['screenshot']['tmp_name'], $screenshot_path);
    }
    $screenshot_path_escaped = $conn->real_escape_string($screenshot_path ?? "");

    // Construct SQL query
    $sql = "INSERT INTO customer_info 
        (religion, name, phone, email, location, business, product, seller, payment_type, payment_mode, amount_paid, amount_pending, tickets, remark, payment_id, screenshot_path, gst_applicable, gst_percentage, gst_amount)
        VALUES (
            '$religion',
            '$name',
            '$phone',
            '$email',
            '$location',
            '$business',
            '$product',
            '$seller',
            '$payment_type',
            '$payment_mode',
            $amount_paid,
            $amount_pending,
            $tickets,
            '$remark',
            '$payment_id',
            '$screenshot_path_escaped',
            '$gst_applicable',
            '$gst_percentage',
            '$gst_amount'
        )";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}
?>
