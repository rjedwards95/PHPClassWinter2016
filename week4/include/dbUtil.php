<?php

/*
 * Method to connect to PHPClassWinter2016 database. Taken from class files.
 * 
 * @return Database PDO.
 */

function dbconnect() {
    //Set configuration for database connection.
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPClassWinter2016',
        'DB_USER' => 'php',
        'DB_PASS' => 'winter16'
    );

    //Attempts connection to database.    
    try {
        //Stores databse data in variable.
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASS']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        //If there are any issues connecting the "catch" statement catches the error and kills process here.
    } catch (Exception $ex) {
        echo $ex;
        exit();
    }
    //returns database PDO.
    return $db;
}

/*
 * Method to pull all data from the database.
 * 
 * @return $results as array.
 */
function dbAll() {
    $db = dbconnect();

    $stmnt = $db->prepare("SELECT * from corps");

    $results = array();

    if ($stmnt->execute() && $stmnt->rowCount() > 0) {
        $results = $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

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

/*
 * A method to pull column names in an array.
 * 
 * @return column names as array.
 */
function colName($tableName) {
    $db = dbconnect();
    $colName = array();

    //Prepares statement for column list
    $stmt = $db->prepare("SHOW columns FROM $tableName;");

    $cols = array();
    //if statement executes fetches column names
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $cols = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //Kills function and displays an error.
    } else {
        die("Table doesn't exist");
    }

    //Loops $cols to fill $colName array with the column names.
    foreach ($cols as $value) {
        $colName[] = $value['Field'];
    }
    //return the $colName array.
    return $colName;
}

/*
 * Method to search in the results from the database.
 * 
 * @return $results as array.
 */
function searchDB($column, $search) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search");

    $search = '%' . $search . '%';
    $binds = array(
        ":search" => $search
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

/*
 * Method to sort the results from the database.
 * 
 * @return $results as array.
 */
function sortDB($column, $sort) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $sort");
    
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}
