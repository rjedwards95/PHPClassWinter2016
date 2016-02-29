<?php

/*
 * users
 * user_id
 * email
 * password
 */

function isValidUser( $email, $pass ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass        
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

function logOut($logout){
    if($logout != false){
        session_destroy();
        ob_end_clean();
        die("<h5>You have been logged out</h5><a href='http://localhost/PhpClassWinter2016/week6/lab/admin/'>Go back to Login</a>");
    }
}