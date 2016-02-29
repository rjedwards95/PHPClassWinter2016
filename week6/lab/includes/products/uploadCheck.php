<?php
//Taken from week 7 demo. 
try {
    
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if ( !isset($_FILES['image']['error']) || is_array($_FILES['image']['error']) ) {       
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['image']['error'] value.
    switch ($_FILES['image']['error']) {
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
    if ($_FILES['image']['size'] > 100000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['image']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $validExts = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                );    
    $ext = array_search( $finfo->file($_FILES['image']['tmp_name']), $validExts, true );
    
    
    if ( false === $ext ) {
        throw new RuntimeException('Invalid file format.');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['image']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    
    $fileName =  sha1_file($_FILES['image']['tmp_name']); 
    $location = sprintf('../../includes/products/uploads/%s.%s', $fileName, $ext); 
        
    $FN = $fileName . "." . $ext;
    if ( !move_uploaded_file( $_FILES['image']['tmp_name'], $location) ) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}