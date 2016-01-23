<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" rel ="stylesheet">
        <title>Add Corporation</title>
    </head>
    <body>
        <?php
        include_once 'dbconnect.php';
        include_once 'functions.php';

        $db = dbconnect();

        $results = "";
        $corp = "";
        $email = "";
        $zipcode = "";
        $owner = "";
        $phone = "";

        if (isPostRequest()) {
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zip, owner = :owner, phone = :phone");


            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zip');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');


            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zip" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            } else {
                $results = 'Data not Added';
            }
        }
        ?>
        <h1>Add Corporation to Database</h1>
        <h3><?php echo $results; ?></h3>

        <form method="post" action="#">  
            <table border="1" class="table table-striped">
                <tr>
                    <th class="center">Corp. Name</th>
                    <th class="center">Corp. Email</th>
                    <th class="center">Corp. Zip</th>
                    <th class="center">Corp. Owner</th>
                    <th class="center">Corp. Phone</th>
                </tr>
                <tr>
                    <td><input type="text" value="<?php echo $corp; ?>" name="corp" /></td>
                    <td><input type="text" value="<?php echo $email; ?>" name="email" /></td>
                    <td><input type="text" value="<?php echo $zipcode; ?>" name="zip" /></td>
                    <td><input type="text" value="<?php echo $owner; ?>" name="owner" /></td>
                    <td><input type="text" value="<?php echo $phone; ?>" name="phone" /></td>
                </tr>
            </table>
            <input class="btn btn-success" type="submit" value="Submit" />
            <a class="btn btn-primary" href="view.php"> Go back </a>
        </form>
    </body>
</html>
