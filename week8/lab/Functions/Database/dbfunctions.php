<?php

//Checks if user is valid user.
function isValidUser($user, $pass) {

    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $binds = array(
        ":email" => $user,
        ":password" => $pass
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            if($result['password'] === $pass){
            return $result['user_id'];
            }else{
                return false;
            }
        }
    }

    return false;
}

//Adds a user to the database.
function addUser($user, $pass) {
    $db = dbconnect();

    $stmt = $db->prepare("INSERT INTO users SET email = :user, password = :pass, created = now()");
    $binds = array(
        ":user" => $user,
        ":pass" => $pass
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    return false;
}

//Pulls data from address book.
function allData($id) {
    $db = dbconnect();
    if($id != false){
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = $id");
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } else {
        return false;
    }
    }else{
        return false;
    }
}

//Gets all the groups.
function getGroup() {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * from address_groups");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

//Deletes item from database
function deleteData($address_id) {
    $db = dbconnect();

    $stmt = $db->prepare("DELETE FROM address WHERE address_id = :address_id");
    $binds = array(
        ":address_id" => $address_id
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    return false;
}
