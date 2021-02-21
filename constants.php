<?php
//read users.txt after submitting

function RegisterUser($logname, $logpass) {


    $file="users.txt";
    $preadd = "\n$logname,$logpass,12000,0,0";
    $fopen = fopen($file, "a");
    $newreg = $preadd;
    fwrite($fopen, $newreg);

    fclose($fopen);
    echo $logname ." successfully added to ". $file;
}
/*$userList = file('users.txt');
//$userlist is an array
$success = false;

foreach ($userList as $key) {

    $user_details = explode(",", $key);
    print $user_details[0];
    print $user_details[1] ;

}*/
function matcher($name,$pass)
{


    $userList = file('users.txt');
//$userlist is an array
    $success = false;

    foreach ($userList as $key) {

        $user_details = explode(",", $key);
        if ($user_details[0] == $name && $user_details[1] == $pass) {
            $success = true;
            echo "success";
            break;
        }

    }

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.

    if ($success) {
        ob_start();
        $_SESSION['UserData']['Username'] = $userList[$name];
        header('Location:secret.php');
        ob_end_flush();
        die();
    } else {
        echo "<br> You have entered the wrong username or password. Please try again. <br>";
    }
}
//echo matcher("Jose","6767");
//echo RegisterUser("Ricardo","4345");

//jaime stuff


/* Check Login form submitted *///if (isset($_POST['Submit'])) {
    /* Define username and associated password array *///$logins = array('Alex' => '123456','username1' => 'password1','username2' => 'password2');

    /* Check and assign submitted Username and Password to new variable *///$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
   // $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    /* Check Username and Password existence in defined array */
   // if (isset($logins[$Username]) && $logins[$Username] == $Password) {
        /* Success: Set session variables and redirect to Protected page  */
    //    $_SESSION['UserData']['Username']=$logins[$Username];
        //  $_SESSION['UserData']['Username']=$userList[$Username];
    //    header("location:private.php");

    //    exit;
   // } else {
   //     /*Unsuccessful attempt: Set error message */$msg="<span style='color:red'>Invalid Login Details</span>";
   // }
//}

?>