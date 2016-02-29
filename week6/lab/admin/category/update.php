<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Categories CRUD</title>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        include_once '../../includes/ico.html.php';
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include '../../functions/utils-function.php';
        ?>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';


        $id = filter_input(INPUT_GET, 'id');
        $category = "";

        if (isPostRequest()) {

            $category = filter_input(INPUT_POST, 'category');

            $message = updateCategory($category, $id);
            
        } else {
            $category = specificCategory($id);
        }
        ?>
        <h1>
            Update data for <?php echo $category; ?>
        </h1>
        <p>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>

        <form method="post" action="#">  
            <table border="1" class="table table-striped">
                <tr>
                    <th>Category</th>
                </tr>
                <tr>
                    <td><input type="text" value="<?php echo $category; ?>" name="category" /></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input class ="btn btn-default" type="submit" value="Submit" />
            <a class="btn btn-primary" href="index.php"> Go back </a>
        </form>   
    </body>
</html>
