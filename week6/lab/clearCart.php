<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clear Cart</title>
    </head>
    <body>
        <?php
        require './includes/store/session-start.req-inc.php';
        $_SESSION['cart'] = array();
        ?>
        <h1>Cart Cleared</h1>
        <a href="index.php">Go home</a>
    </body>
</html>
