<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Actor Database</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php
        //Includes the db.php file for the db class item.
        include './db.php';

        //Makes new db class object.
        $db = new db();
        //sets the results to the result array of the viewData() function.
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
                    <!-- Loops the generation of the table and fills table with data from
                            actor table on the database--> 
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['height']; ?></td>
                            <td><?php echo date('n/j/Y',  strtotime($row['dob'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <a href="add.php"> Add Data </a>
            </div>
        </div>
    </body>
</html>
