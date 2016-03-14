<?php

//Adds user to system.
if (!isset($message) && addUser($user, $password)) {
    $message = "Added";
    echo "<br/>" . $message;
} else {
    echo "<br/>"; 
    if(isset($message)){
        echo $message;
        
    }
}