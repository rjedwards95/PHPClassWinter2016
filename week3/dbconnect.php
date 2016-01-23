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