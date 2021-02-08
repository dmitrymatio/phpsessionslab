<?php session_start(); /* Starts the session */
/* Check Login form submitted */if (isset($_POST['Submit'])) {
    /* Define username and associated password array */$logins = array('Alex' => '123456','username1' => 'password1','username2' => 'password2');

    /* Check and assign submitted Username and Password to new variable */$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    /* Check Username and Password existence in defined array */if (isset($logins[$Username]) && $logins[$Username] == $Password) {
        /* Success: Set session variables and redirect to Protected page  */$_SESSION['UserData']['Username']=$logins[$Username];
        header("location:private.php");
        exit;
    } else {
        /*Unsuccessful attempt: Set error message */$msg="<span style='color:red'>Invalid Login Details</span>";
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

  
    <?php if (isset($msg)) {?>

     <?php echo $msg;?>

    <?php } ?>
    <h1>Sessions Lab</h1>
    <br>

    <h3>Username</h3>
    <td><input name="Username" type="text" class="email"></td>


    <h3>Password</h3>
    <td><input name="Password" type="password" class="email"></td>


    <td><input name="Submit" type="submit" value="Login" class="btn"></td>
    <td><input name="Submit" type="submit" value="Register" id="btn2"></td>

  </table>
</form>
</div>

</body>
</html>