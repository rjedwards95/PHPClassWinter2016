<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <title>Add to Link Database</title>
    </head>
    <body>
        <?php
        include './includes/header.php';

        include_once './includes/curlFun.php';
        include_once './includes/dbUtil.php';

        $url = filter_input(INPUT_POST, 'url');

        if (isPostRequest()) {
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                if (searchDB($url)) {
                    echo '<h3> Site is already in system.</h3>';
                }
            elseif(!filter_var($url, FILTER_VALIDATE_URL)) {
                    echo '<h3>URL is not valid!</h3>'
                    . '<h5>Please use "http://www.[SITE].[com,edu,...]/" format</h5>';
                }
            else{
                    $pageData = getCurl($url);
                    echo "<h3> $url</h3>";
                    $links = matchURL($pageData);
                    $message = addData($url, $links);
                    $url = "";
                }
            }
        }
        ?>

        <?php
        if (isset($message)):
            include_once './includes/linkTable.php';
            ?>

            <br/>
        <?php elseif(ispostRequest()): ?>
            <h3>Data not Added</h3>
        <?php endif; ?>
        <form action="#" method="POST">
            <input type="text" name="url" value="<?php if (isset($url)) {
            echo $url;
        } ?>"/>
            <input type="submit" name="submit"/>
        </form>
    </body>
</html>
