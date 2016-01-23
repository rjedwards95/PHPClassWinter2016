<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" rel ="stylesheet">
        <title>View Corporation Database</title>
    </head>
    <body>
        <?php
        include_once 'dbconnect.php';

        $db = dbconnect();

        $stmnt = $db->prepare("SELECT * from corps");

        $results = array();

        if ($stmnt->execute() && $stmnt->rowCount() > 0) {
            $results = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        <h1>
            Corporations Table
        </h1>

        <table border="1" class="table table-striped">
            <tr>
                <th class="tableCenter">Corp Name</th>
                <th class="tableCenter">Read</th>
                <th class="tableCenter">Update</th>
                <th class="tableCenter">Delete</th>
            </tr>
            <?php foreach ($results as $row): ?>
                <tr class="tableCenter">
                    <td class="tableLeft"><?php echo $row['corp']; ?></td>
                    <td><a class="btn btn-primary" href = "read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a class ="btn btn-default" href = "update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a class="btn btn-warning" href = "delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a class="btn btn-success" href="add.php">Add Corporation</a>
    </body>
</html>
