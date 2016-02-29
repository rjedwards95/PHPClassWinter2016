<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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

        $id = filter_input(INPUT_GET, 'id');
        $img = filter_input(INPUT_GET, 'img');
        unlink($img);

        $isDeleted = deleteProduct($id);
        ?>

        <h1> Record <?php echo $id; ?>  
        <?php if (!$isDeleted): ?>Not<?php endif; ?> 
            Deleted
        </h1>

        <a class="btn btn-primary" href="index.php"> Go back </a>

    </body>
</html>