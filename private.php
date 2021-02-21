<?php session_start(); /* Starts the session */
$success = true;
if(!isset($_SESSION['UserData']['Username'])){
header("location:login.php");
exit;
}
?>

Congratulation! You have logged into password protected page. 
<br>
<a href="secret.php">Click here</a> to view secret page.
<br>
<a href="logout.php">Click here</a> to Logout.