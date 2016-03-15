<?php

//Adds data to Address database.
function addData($address_id ,$fullName, $email, $tell, $address, $website, $birthday, $image){
    $db = dbconnect();

    
    if(!empty($image)){
    $stmt = $db->prepare("INSERT INTO address SET address_group_id = :address_id, user_id = :user_id, fullname = :fullname, email = :email, address = :address, phone = :tell, website = :website, birthday = :birthday, image = :image");
    $binds = array(
        ":address_id" => $address_id,
        ":user_id" => $_SESSION['id'],
        ":fullname" => $fullName,
        ":email" => $email,
        ":address" => $address,
        ":tell" => $tell,
        ":website" => $website,
        ":birthday" => $birthday,
        ":image" => $image
    );
    }else{
        $stmt = $db->prepare("INSERT INTO address SET address_group_id = :address_id, user_id = :user_id, fullname = :fullname, email = :email, address = :address, phone = :tell, website = :website, birthday = :birthday");
    $binds = array(
        ":address_id" => $address_id,
        ":user_id" => $_SESSION['id'],
        ":fullname" => $fullName,
        ":email" => $email,
        ":address" => $address,
        ":tell" => $tell,
        ":website" => $website,
        ":birthday" => $birthday
    );
    }

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    return false;
}