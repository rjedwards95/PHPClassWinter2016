<?php

//Assigns the form variables to upload.
if (isPostRequest()) {
    $address_id = filter_input(INPUT_POST, 'address_id');
    $fullName = filter_input(INPUT_POST, 'firstname') . " " . filter_input(INPUT_POST, 'lastname');
    $email = filter_input(INPUT_POST, 'email');
    $tell = filter_input(INPUT_POST, 'telephone');
    $street = filter_input(INPUT_POST, 'street');
    $town = filter_input(INPUT_POST, 'town');
    $state = filter_input(INPUT_POST, 'state');
    $zipcode = filter_input(INPUT_POST, 'zip');
    $website = filter_input(INPUT_POST, 'website');
    $birthday = filter_input(INPUT_POST, 'birthday');
    try {
        $image = uploadImage('upfile');
    } catch (RuntimeException $ex) {
        $image = '';
    }
    $message = checkData($email, $tell, $zipcode);
    
    if($message != true){
    echo "<br/>" . implode(', ', $message);     
    }
    $address = $street . " " . $town . ", " . $state . " " . $zipcode; 
    
} else {
    $address_id = NULL;
    $fullName = NULL;
    $email = NULL;
    $tell = NULL;
    $street = NULL;
    $town = NULL;
    $state = NULL;
    $zipcode = NULL;
    $website = NULL;
    $birthday = NULL;
    $image = NULL;
}