<?php

// Set the session to last for a day (in seconds)
$sessionLifetime = 43200; // 12 hours * 60 minutes * 60 seconds

// Check if a session is already active before starting a new one
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params($sessionLifetime, '/');
    session_start();
}


// Set the session expiration time
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $sessionLifetime)) {
    session_unset();    // Unset all session variables
    session_destroy();  // Destroy the session data
}

// Continue with your website logic
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    if(!$username || !$password) {
        $msg="Invalid user!";
        $msgEncoded = urlencode($msg);
        header("location: login.php?msg=$msgEncoded");
        exit();
    }
}else {
    $msg="Please login first!";
    $msgEncoded = urlencode($msg);
    header("location: login.php?msg=$msgEncoded");
    exit();
}
?>