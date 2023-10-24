<?php
session_start(); // Start the session (if it's not already started)

// Unset all session variables (clear all session data)
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other appropriate page
header("Location: login.php");
exit;
?>
