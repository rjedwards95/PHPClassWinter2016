<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Products CRUD</title>
        <?php 
        require_once '../../includes/session-start.req-inc.php'; 
        include_once '../../includes/ico.html.php';
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/products-functions.php';
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
            $results = getAllProducts();
            
            include '../../includes/products/productTable.php';
        ?>
        
        <p><a class="btn btn-primary" href="create.php">Create</a>
        <a class="btn btn-warning" href="../index.php">Home</a></p>
    </body>
</html>

