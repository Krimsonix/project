<?php

function processAuth($user, $password) {

    $auth = array();
    $auth["return"] = false;
    $auth["message"] = "";

    $sql = "SELECT *
            FROM auth_user
            WHERE username = '$user'";

    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);

    // Check if user exists
    if ($row) {

        //check if password is valid
        if ($row["password"] == md5($password)){
            $auth["return"] = true;
        }
        else {
            $auth["message"] = "Password is not correct.";
        }
    }
    else {
            $auth["message"] = "User does not exist.";
    }

    return ($auth);

}