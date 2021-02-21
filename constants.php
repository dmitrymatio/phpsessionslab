<?php


function ModifyUser($logname, $logpass, $attempt = 0, $islocked = 0)
{
    $file = "users.txt";
    $t=time();
    $file_data = "$logname,$logpass,$t,$attempt,$islocked\n";
    $file_data .= file_get_contents($file);
    file_put_contents($file, $file_data);
}

function Matcher($name)
{
    $userList = file('users.txt');
    //$userlist is an array
    $user = null;

    foreach ($userList as $value) {

        $user_details = explode(",", $value);

        if ($user_details[0] === $name) {
            $user = $user_details;
            break;
        }
    }

    return $user;
}

function Login($name, $pass)
{
    $user_details = Matcher($name); //either null or returns user_details array

    $success = false;

    if (!is_null($user_details)) {
        if ($user_details[0] === $name) {
            if ($user_details[4] == 0) {
                if ($user_details[0] === $name && $user_details[1] === $pass) {
                    $success = true;
                } else if ($user_details[3] == 2) {
                    ModifyUser($user_details[0], $user_details[1], 3, 1);
                } else if ($user_details[3] < 2) {
                    $count = $user_details[3] + 1;
                    ModifyUser($user_details[0], $user_details[1], $count, 0);
                }
            } else {
                echo "Account is locked";
            }
        }
    }

    if ($success) {
        return true;
    } else {
        return false;
    }
}
