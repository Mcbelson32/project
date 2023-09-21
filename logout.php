<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session data
session_destroy();

// Redirect to the login page or any other desired page
$msg = "You have been successfully logged out.";
$msgEncoded = urlencode($msg);
header("Location: login.php?msg=$msgEncoded");
exit();
?>