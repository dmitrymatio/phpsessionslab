<?php session_start(); /* Starts the session */
require_once("constants.php");

//move jaime code over to constants for now


?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="box">
<form action="" method="post" name="Login_Form">

  
    <?php if (isset($msg)) {?>

     <?php echo $msg;?>

    <?php } ?>
    <h1>Sessions Lab</h1>
    <br>

    <h3>Username</h3>
    <td><input name="Username" type="text" class="email"></td>


    <h3>Password</h3>
    <td><input name="Password" type="password" class="email"></td>


    <td><input name="Submit" type="submit" value="Login" class="btn" onclick="matcher()"></td>
    <td><input name="Submit" type="submit" value="Register" id="btn2" onclick="RegisterUser()"></td>

  </table>
</form>
</div>

</body>
</html>