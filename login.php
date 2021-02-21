<?php

require_once("constants.php");
// Start the session
session_start();

// Session timeout duration in seconds
// Specify value lesser than the PHPs default timeout of 24 minutes
$timeout = 900;

// Check existing timeout variable
if (isset($_SESSION['lastaccess'])) {

  // Time difference since user sent last request
  $duration = time() - intval($_SESSION['lastaccess']);

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

// Set the last request variable
$_SESSION['lastaccess'] = time();

/* Check Login form submitted */
if (isset($_POST['login'])) {

  /* Check and assign submitted Username and Password to new variable */
  $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

  /* Check Username and Password existence in defined array */
  if (Login($Username, $Password)) {
    /* Success: Set session variables and redirect to Protected page  */
    $_SESSION['UserData']['Username'] = $Username;
    header("location:private.php");

    exit;
  } else {
    /*Unsuccessful attempt: Set error message */
    $msg = "<span style='color:red'>Invalid Login Details</span>";
  }
} else if (isset($_POST['register'])) {
  $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

  if ($Username === '' || $Password === '') {
    $msg = "<span style='color:red'>Username and password cannot be empty</span>";
  } else {
    if (is_null(Matcher($Username, $Password))) {
      ModifyUser($Username, $Password);
    } else {
      $msg = "<span style='color:red'>User already exists</span>";
    }
  }
}



?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <div class="box">
    <form action="" method="post" name="Login_Form">


      <?php if (isset($msg)) { ?>

        <?php echo $msg; ?>

      <?php } ?>
      <h1>Sessions Lab</h1>
      <br>

      <h3>Username</h3>
      <td><input name="Username" type="text" class="email"></td>


      <h3>Password</h3>
      <td><input name="Password" type="password" class="email"></td>


      <td><input name="login" type="submit" value="Login" class="btn"></td>
      <td><input name="register" type="submit" value="Register" id="btn2"></td>

      </table>
    </form>
  </div>

</body>

</html>