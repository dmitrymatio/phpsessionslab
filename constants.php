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

function matcher($name,$pass) {


    $file="users.txt";
    $fopen = fopen($file, "r+");

    $fread = fread($fopen,filesize($file));
    fclose($fopen );
    $mystring = $fread;
    $findme   = $name;
    $findpass = $pass;
    $pos1 = strpos($mystring, $findme);
    $pos2 = strpos($mystring, $findpass);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
    if ($pos1 == true && $pos2 == true ) {
        ob_start();
        header('Location:secret.php');
        ob_end_flush();
        die();
    } else {
      echo "fail it";
       /* */
    }
}
//echo matcher("Jose","6767");
//echo RegisterUser("Ricardo","4345");
?>