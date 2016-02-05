<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <title>View Site Database</title>
    </head>
    <body>
        <?php
        include './includes/header.php';
        include_once './includes/dbUtil.php';

        $columns = colName();

        if (isPostRequest()) {
            $site_id = filter_input(INPUT_POST, 'site_id');
            $links = dbSite($site_id);
        } else {
            $site_id = null;
        }
        ?>

        <form action="#" method="POST">
            Select from dropdown:   <select name='site_id'>
                <?php foreach ($columns as $column): ?>
                    <option<?php if ($column['site_id'] == $site_id): ?> selected="selected"<?php endif; ?> value ="<?php echo $column['site_id']; ?>"><?php echo $column['site']; ?> </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value ="Submit"/>
        </form>

        <?php
        if(isset($links)){
            include_once "./includes/linkTable1.php";
        }
        ?>


    </body>
</html>
