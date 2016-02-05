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
function dbSite($site_id) {
          $db = dbconnect();

            $stmt = $db->prepare("SELECT link FROM sitelinks JOIN sites ON sites.site_id = sitelinks.site_id WHERE sitelinks.site_id=:site_id");
            
            $binds = array(
                ":site_id" => $site_id
             );
            $results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            }else{
                die($site_id);
                return null;
            }
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
function colName() {
    $db = dbconnect();

    //Prepares statement for column list
    $stmt = $db->prepare("SELECT * FROM sites;");

    $cols = array();
    //if statement executes fetches column names
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $cols = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //Kills function and displays an error.
    } else {
        die("Table doesn't exist");
    }

    return $cols;
}

/*
 * Method to search in the results from the database.
 * 
 * @return bool;
 */
function searchDB($url) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM sites WHERE site=:site");

    $binds = array(
        ":site" => $url
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return true;
    }else{
        return false;
    }
}

/*
 *Add data to database.
 * 
 * @return result statement 
 */
function addData($url, $links){
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO sites SET site = :site ,date = now()");

            $binds = array(
                ":site" => $url,
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                
                $site_id = $db->lastInsertId();
                        
                    /* prepare the next table to insert the values with the join ID */
                    $stmt = $db->prepare("INSERT INTO sitelinks SET site_id = :site_id, link = :link");
 
                    /* as we loop through the cities we can insert each 
                     * city with a reference to the relational ID one at a time
                     */
                    foreach ($links as $link) {
                        $binds = array( ":link" => $link, ":site_id" => $site_id); 
                        $stmt->execute($binds);
                    }
                
                $results = 'Site Data Added';
            } else {
                $results = '';
            }
            return $results;
}