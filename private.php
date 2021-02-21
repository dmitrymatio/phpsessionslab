<?php

session_start();

// Session timeout duration in seconds
// Specify value lesser than the PHPs default timeout of 24 minutes
$timeout = 900;

// Check existing timeout variable
if (isset($_SESSION['lastaccess'])) {

    // Time difference since user sent last request
    $duration = time() - intval($_SESSION['lastaccess']);
    echo 'Logged in as ' . $_SESSION['UserData']['Username'] . ' for ' . $duration . ' seconds';

    // Destroy if last request was sent before the current time minus last request
    if ($duration > $timeout) {

        // Clear the session
        session_unset();

        // Destroy the session
        session_destroy();

        // Restart the session
        session_start();
    }
}
$success = true;
if (!isset($_SESSION['UserData']['Username'])) {
    header("location:login.php");
    exit;
}
?>

Congratulation! You have logged into password protected page.

<br>
<a href="secret.php">Click here</a> to view secret page.
<br>
<a href="logout.php">Click here</a> to Logout.