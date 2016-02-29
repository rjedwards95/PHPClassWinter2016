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
        ?>
    </head>
    <body>
        <?php
            require_once '../../includes/session-start.req-inc.php';
            require_once '../../includes/access-required.html.php';

        $id = filter_input(INPUT_GET, 'id');

        $isDeleted = deleteCategory($id);
        ?>

        <h1> Record <?php echo $id; ?>  
        <?php if (!$isDeleted): ?>Not<?php endif; ?> 
            Deleted
        </h1>

        <a class="btn btn-primary" href="index.php"> Go back </a>

    </body>
</html>
