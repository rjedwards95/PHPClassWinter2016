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
        <title>Read Data</title>
    </head>
    <body>
        <?php
        include_once 'dbconnect.php';

        $id = filter_input(INPUT_GET, 'id');
        
        $db = dbconnect();

        $stmnt = $db->prepare("SELECT * from corps WHERE id = :id");
        
        $binds = array(
             ":id" => $id
        );
        
        $result = array();

        if ($stmnt->execute($binds) && $stmnt->rowCount() > 0) {
            $result = $stmnt->fetch(PDO::FETCH_ASSOC);
            $corp = $result['corp'];
            $date = date('m/d/Y',  strtotime($result['incorp_dt']));
            $email = $result['email'];
            $zipcode = $result['zipcode'];
            $owner = $result['owner'];
            $phone = $result['phone'];
        }else {
             header('Location: view.php');
             die('ID not found');
             
         }
        ?>
        
        <h1>
            Results for <?php echo $corp;?>
        </h1>
        
            <table border="1" class="table table-striped">
                <tr>
                    <th class="tableCenter">Corp. Name</th>
                    <th class="tableCenter">Date Corp. Added</th>
                    <th class="tableCenter">Corp. Email</th>
                    <th class="tableCenter">Corp. Zip</th>
                    <th class="tableCenter">Corp. Owner</th>
                    <th class="tableCenter">Corp. Phone</th>
                    <th class="tableCenter">Update</th>
                    <th class="tableCenter">Delete</th>
                </tr>
                <tr class="tableCenter">
                    <td><?php echo $corp;?></td>
                    <td><?php echo $date;?></td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $zipcode;?></td>
                    <td><?php echo $owner;?></td>
                    <td><?php echo $phone;?></td>
                    <td><a class ="btn btn-default" href = "update.php?id=<?php echo $id;?>">Update</a></td>
                    <td><a class="btn btn-warning" href = "delete.php?id=<?php echo $id;?>">Delete</a></td>
                </tr>
            </table>
        <a class="btn btn-primary" href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>"> Go back </a>
    </body>
</html>
