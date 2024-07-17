<?php
// Start the session
session_start();

// Check if the user is already logged in, if not, redirect them to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Check if the logout button is clicked
if(isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("location: login.php");
    exit;
}
?>
