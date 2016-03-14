<?php

//Runs the database functions and verifies user.
if ($user != -1 && $password != -1) {
    dbconnect();

    if (!isValidUser($user, $password)) {
        $_SESSION['message'] = "Login Failed";
    }
    $_SESSION['login'] = true;
    $_SESSION['id'] = isValidUser($user, $password);
    header('Location: index.php');
}

