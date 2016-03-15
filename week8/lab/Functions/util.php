<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

/**
 * A method to check if a Get request has been made.
 *    
 * @return boolean
 */
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}

//Verifies Data
function checkData($address_id, $firstName, $lastName, $birthday, $email, $street, $town, $state, $tell, $zipcode){
    $e_messageRaw = array();
    
    $emailRegex = '/^[a-zA-Z0-9$]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]{2,3}$/';
    $tellRegex = '/^[(]?[1]?[0-9]{3}[)]?[-]?[0-9]{3}[-]?[0-9]{4}$/';
    $zipRegex = '/^[0-9]{5}$/';
    $variables = array(
        "Group ID" => $address_id,
        "First name" => $firstName,
        "Last name" => $lastName,
        "Birthday" => $birthday,
        "Street" => $street,
        "Town" => $town,
        "State" => $state,
    );

    foreach($variables as $key=>$variable){
        $e_messageRaw[] = checkEmpty($variable, $key);
    }
    if(!preg_match($emailRegex, $email)){
        $e_messageRaw[] = "Email not valid!";
    }
    if(!preg_match($tellRegex, $tell)){
        $e_messageRaw[] = "Telephone is not valid!";
    }
    if(!preg_match($zipRegex, $zipcode)){
        $e_messageRaw[] = "Zipcode isn't valid!";
    }
    
    $e_message = implode(', ', array_filter($e_messageRaw));
    if(isset($e_message)){
        return $e_message;
    }
        return false;
}

/*
 * Checks to see if variable is empty
 * 
 * @return NULL if empty, message if false.
 */
function checkEmpty($variable, $name){
    if(empty($variable)){
        return  $name ." is not set.";
    }
    return NULL;
}

//Checks image to see if it works and uploads to file.
function uploadImage($fieldName){
    
    /* make sure path to upload images matches where you want to upload it */
    $folderLocation = '../images/';
    
    if ( !is_string($fieldName) || empty($fieldName) ) {
        throw new RuntimeException('Field Name must be a string.');
    }
       
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if ( !isset($_FILES[$fieldName]['error']) || is_array($_FILES[$fieldName]['error']) ) {       
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES[$fieldName]['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
     
    // You should also check filesize here. 
    if ($_FILES[$fieldName]['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $validExts = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                );    
    $ext = array_search( $finfo->file($_FILES[$fieldName]['tmp_name']), $validExts, true );
    
    
    if ( false === $ext ) {
        throw new RuntimeException('Invalid file format.');
    }
    
    $fileName =  sha1_file($_FILES[$fieldName]['tmp_name']); 
    $location = sprintf($folderLocation.'%s.%s', $fileName, $ext); 
    
    if (!is_dir($folderLocation)) {
        mkdir($folderLocation);
    }
        
    if ( !move_uploaded_file( $_FILES[$fieldName]['tmp_name'], $location) ) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    /* return the file name uploaded */
    return $fileName.'.'.$ext;
}
