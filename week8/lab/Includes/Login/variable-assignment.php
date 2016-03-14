<?php
//Assigns the user and password variables
if (isPostRequest()) {
    $emailRaw = filter_input(INPUT_POST, 'user');
    $emailOnlyRegex = '/^[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}$/';
    
    if(preg_match($emailOnlyRegex, $emailRaw)){
    $user = $emailRaw;
    }else{
        $user = -1;
        $message = "Email is not valid.";
    }
    $password = sha1(filter_input(INPUT_POST, 'password'));
} else {
    $user = -1;
    $password = -1;
}