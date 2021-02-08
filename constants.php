<?php
//read users.txt after submitting

function logUser() {


    $file="users.txt";

    $fopen = fopen($file, "r+");

    $fread = fread($fopen,filesize($file));

    fclose($fopen);

    $remove = "\n";

    $split = explode($remove, $fread);

    $array[] = null;
    $tab = "\t";

    foreach ($split as $string)
    {
        $row = explode($tab, $string);
        array_push($array,$row);
    }
    echo "<pre>";
    print_r($array);
    echo "</pre>";

    if($array){
    for($x=0;$x<count($array); $x++){
        if($array == $x) {
            echo "cheese";
        }
    }
    }

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
        echo "user and password match";
    } else {
      echo "fail it";
       /* ob_start();
        header('Location:secret.php');
        ob_end_flush();
        die();*/
    }
}
echo matcher("Jose","6767");
?>