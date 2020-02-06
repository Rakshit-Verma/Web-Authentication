<?php
// Initialize the session
session_start();

if (!$_SESSION['user']) {
    header('Location: login.php');
}

// Unset all of the session variables
unset($_SESSION['user']);
session_unset();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit;
