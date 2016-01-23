<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" rel ="stylesheet">
        <title>Update Data</title>
    </head>
    <body>
        <?php
        include_once './dbconnect.php';
        include_once './functions.php';

        $db = dbconnect();

        $corp = "";
        $email = "";
        $zipcode = "";
        $owner = "";
        $phone = "";

        if (isPostRequest()) {

            $id = filter_input(INPUT_POST, 'id');
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zip');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $stmnt = $db->prepare("UPDATE corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zip, owner = :owner, phone = :phone WHERE id = :id");

            $binds = array(
                ":id" => $id,
                ":corp" => $corp,
                ":email" => $email,
                ":zip" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            $message = 'Update failed';
            if ($stmnt->execute($binds) && $stmnt->rowCount() > 0) {
                $message = 'Update Complete';
            }
        } else {
            $id = filter_input(INPUT_GET, 'id');
        }

        $stmnt = $db->prepare("SELECT * FROM corps where id = :id");

        $binds = array(
            ":id" => $id
        );

        $result = array();

        if ($stmnt->execute($binds) && $stmnt->rowCount() > 0) {
            $result = $stmnt->fetch(PDO::FETCH_ASSOC);
            $corp = $result['corp'];
            $date = date('m/d/Y', strtotime($result['incorp_dt']));
            $email = $result['email'];
            $zipcode = $result['zipcode'];
            $owner = $result['owner'];
            $phone = $result['phone'];
        } else {
            header('Location: view.php');
            die('ID not found');
        }
        ?>
        <h1>
            Update data for <?php echo $corp; ?>
        </h1>
        <p>
        <?php if (isset($message)) {
            echo $message;
        } ?>
        </p>

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
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input class ="btn btn-default" type="submit" value="Submit" />
            <a class="btn btn-primary" href="view.php"> Go back </a>
        </form>   
    </body>
</html>
