<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Add Data to Database
        </title>
        <!-- Links Stylesheet to webpage -->
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <?php
        //Includes the db class files.
        include './db.php';
        
        //Initializes new db object.
        $db = new db();
        
        //Initializes the error array and increment.
        $error = array();
        $increment = 0;
        
        //checks to see if the form has been submitted or not.
       if ($db->isPostRequest()){ 
           
           
        //Initializes neccesary variables to send data to table.
        $firstName = filter_input(INPUT_POST, 'firstname');        
        $lastName = filter_input(INPUT_POST, 'lastname');        
        $height = filter_input(INPUT_POST, 'height');        
        $dob = filter_input(INPUT_POST, 'dob');
        /*
         * This area checks to see if the form data is empty, if so
         * the error array is filled to display what areas need to be filled and
         * nulls the variables in case of any issue.
        */
        if($db->checkError('firstname')){
            $firstName = null;
            $error[$increment] = 'First Name not entered';
            $increment++;
        }
        if($db->checkError('lastname')){
            $lastName = null;
            $error[$increment] = 'Last Name not entered';
            $increment++;
        }
        if($db->checkError('height')){
            $height = null;
            $error[$increment] = 'Height not entered';
            $increment++;
        }
        if($db->checkError('dob')){
            $dob = null;
            $error[$increment] = 'Date of Birth not entered';
        }
        
        /*
         * If any of the form data areas are null, this will return the previously
         * formulated error message in string format.
         */
        if($firstName == null || $lastName == null || $height == null || $dob == null && isset($_POST['submit'])){
            $results = implode(", ",$error);
        }
        //Otherwise the page runs as its designed.
        else{
        $results = $db->addData($firstName, $lastName, $height, $dob);
        
        }
    }
    /*
     * If form data isn't submitted, this clears all variables in case of error.
     */
    else{
        $results = "";
        $error = "";
        $firstName = null;
        $lastName = null;
        $height = null;
        $dob = null;
    }
    
    //If everything runs smoothly this clears variables for a new entry.
    if($results === "Data Added"){
    $error = "";
    $firstName = null;
    $lastName = null;
    $height = null;
    $dob = null;
    }
                    
        ?>        
        <!--
        The divs are to keep the page formatted in a neat way. Inside each "value"
        section of the forms, the associated variables are placed in with echos
        in php, in case user doesn't fill out the full form, or in case of error
        all data is still in place for user to resubmit when ready.
        -->
        <div class='wrapper'>
            <div class="Header">
                <h1>

                    Add Actors to Database

                </h1>
            </div>
            <div>
                <form method="post" action="#">
                    <table id='form'>
                        <tr>     
                            <td>
                                First Name:
                            </td>     
                            <td>
                                <input type="text" value="<?php echo $firstName ?>" name="firstname" />
                            </td>
                        </tr>

                        <tr>
                            <td>        
                                Last Name:
                            </td>    
                            <td>
                                <input type="text" value="<?php echo $lastName ?>" name="lastname" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Height:
                            </td>
                            <td>
                                <input type="text" value="<?php echo $height ?>" name="height" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Date of Birth:
                            </td>
                            <td>
                                <input type="date" value="<?php echo $dob ?>" name="dob" />
                            </td>
                        </tr>

                    </table>
                    <input type="submit" id="submit" value="Submit" name="submit" />
                </form>
            </div>
            
            <!--Displays the $result variable, if any errors it will also display here -->
            <div class='results'>
                    <?php echo $results; ?>
            </div>
            <a href="view.php"> View Data</a>
        </div>

    </body>
</html>