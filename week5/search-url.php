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
        //Includes HEader template
        include './includes/header.php';
        //Includes database utilities
        include_once './includes/dbUtil.php';

        $columns = colName();

        //Checks if Post Request to assign the "$site_id" variable.
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
        
        //Includes the Results Table if $links is set.
        if (isset($links)) {
            include_once "./includes/resultsTable.php";
        }
        ?>


    </body>
</html>
