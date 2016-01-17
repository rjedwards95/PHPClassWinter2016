<?php

/**
 * Description of db
 * 
 * Includes all functions for database integration.
 * 
 * @author Ryan
 */
class db {
    /*
     * Method to check if post request is made. Taken from class files in function.php.
     * 
     * @return boolean.
     */

    public function isPostRequest() {
        //Used in functions.php. Checks to see if POST request is true.
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }

    /*
     * Method to connect to PHPClassWinter2016 database. Taken from class files.
     * 
     * @return Database PDO.
     */

    public function getDatabase() {
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
            die('<h1>Issue conntecting with Database</h1>');
        }
        //returns database PDO.
        return $db;
    }

    /*
     * Method to add data to the PHPClassWinter2016 database in the actor table.
     * 
     * @return String ("Data Added" or "Issues with Database")
     * depedning on if succesful
     */

    public function addData($firstName, $lastName, $height, $dob) {
        //Initailizes results variable
        $results = '';

        //Checks to see if the server request is for a 'POST' request.
        if ($this->isPostRequest()) {

            //runs database function and puts results into $db variable.
            $db = $this->getDatabase();


            //Preps database for data to be submitted
            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstName, lastname = :lastName, dob = :dob, height = :height");


            //Binds Table data to php variables.
            $binds = array(
                ':firstName' => $firstName,
                ':lastName' => $lastName,
                ':height' => $height,
                ':dob' => $dob
            );

            //Checks if statment was executed
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = "Data Added";
                //If the stmnt doesn't execute properly, kills process and displays error emssage.    
            } else {
                $results = "Issues with Database";
            }
        }

        //returns results of add. Whether or not it was properly added to database.
        return $results;
    }

    /*
     * Method toconnect to database to recieve data. Taken from view.php in class files.
     * In view.php.
     * 
     * @return $results PDO
     */

    public function viewData() {
        $db = $this->getDatabase();

        $stmt = $db->prepare("SELECT * FROM actors");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    /*
     * Method to check if POST data is empty.
     * 
     * @return boolean
     */

    public function checkError($checkVar) {
        return empty(filter_input(INPUT_POST, $checkVar));
    }

}
