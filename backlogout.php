<?php
// Start session
session_start();

// Destroy session data
session_destroy();

// Redirect to the login page or any other desired page
header("Location: backlogin.php");
exit;
?>
