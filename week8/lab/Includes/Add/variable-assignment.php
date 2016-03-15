<?php

//Assigns the form variables to upload.
if (isPostRequest()) {
    $address_id = filter_input(INPUT_POST, 'address_id');
    $firstName = filter_input(INPUT_POST, 'firstname');
    $lastName = filter_input(INPUT_POST, 'lastname');
    $fullName = $firstName . " " . $lastName;
    $email = filter_input(INPUT_POST, 'email');
    $tell = filter_input(INPUT_POST, 'telephone');
    $street = filter_input(INPUT_POST, 'street');
    $town = filter_input(INPUT_POST, 'town');
    $state = filter_input(INPUT_POST, 'state');
    $zipcode = filter_input(INPUT_POST, 'zip');
    $website = filter_input(INPUT_POST, 'website');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $message = checkData($address_id, $firstName, $lastName, $birthday, $email, $street, $town, $state, $tell, $zipcode);
    try {
        $image = uploadImage('upfile');
    } catch (RuntimeException $ex) {
        $image = '';
    }
    $address = $street . " " . $town . ", " . $state . " " . $zipcode;
    
    if(!empty($tell)&&!empty($email)&&!empty($fullName)&&!empty($address_id)&&!empty($address)&&!empty($birthday)&&empty($message)){
    addData($address_id, $fullName, $email, $tell, $address, $website, $birthday, $image);
    header("Location: index.php");
    }
    
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