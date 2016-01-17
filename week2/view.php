<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Actor Database</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php
        include './db.php';

        $db = new db();

        $results = $db->viewData();
        ?>
        <div class="wrapper">
            <div id ="dataTable">
                <h3> 
                    Actor Table
                </h3>
                <table id = "viewData">
                    <tr>
                        <th> ID </th>
                        <th> First Name</th>
                        <th> Last Name</th>
                        <th> Height</th>
                        <th> Birthday</th>
                    </tr>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['height']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="add.php"> Add Data </a>
            </div>
        </div>
    </body>
</html>
