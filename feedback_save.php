<?php include("headerk.php"); 
include('dbconn.php'); // Database connection file

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$conn) {
    die(json_encode(['error' => 'Database connection failed: ' . mysqli_connect_error()]));
}

// print_r($_SERVER['REQUEST_METHOD']);
// print_r($_REQUEST);
// Handle feedback submission (via POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the POST request and sanitize it
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $video_id = mysqli_real_escape_string($conn, $_REQUEST['video_id']);
    $markCompleted = mysqli_real_escape_string($conn, $_REQUEST['markCompleted']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);
    $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
    $business = mysqli_real_escape_string($conn, $_REQUEST['business']);
    $rating = mysqli_real_escape_string($conn, $_REQUEST['rating']);
    $learned = mysqli_real_escape_string($conn, $_REQUEST['learned']);
    $improvement = mysqli_real_escape_string($conn, $_REQUEST['improvement']);
    $tpeg = mysqli_real_escape_string($conn, $_REQUEST['tpeg']);
    $comments = mysqli_real_escape_string($conn, $_REQUEST['comments'] ?? '');

    // SQL query to insert feedback
    $insertSql = "INSERT INTO feedback (user_id, video_id, name, mobile, city, business, feedback, learned, improvement, tpeg, comments, markCompleted, created_at, updated_at) 
                  VALUES ('$user_id', '$video_id', '$name', '$mobile', '$city', '$business', '$rating', '$learned', '$improvement', '$tpeg', '$comments', '$markCompleted', NOW(), NOW())";

    if (mysqli_query($conn, $insertSql)) {
        // Success response
        // echo json_encode(['message' => 'Feedback submitted successfully']);
        echo '<div class="flex items-center justify-center ">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
            <div class="mb-6 text-center">
                <p class="text-green-500 text-lg font-semibold">Feedback submitted successfully!</p>
            </div>
            <div class="flex justify-center">
                <a href="javascript:history.back()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    Go Back
                </a>
            </div>
        </div>
    </div>';

    } else {
        // Error response
        echo json_encode(['error' => 'Failed to submit feedback: ' . mysqli_error($conn)]);
    }
} else {
    // Invalid request response
    echo json_encode(['error' => 'Invalid request method']);
}

// Close the database connection
mysqli_close($conn);
?>
