<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        include_once './functions/dbconnect.php';
        include_once './functions/utils-function.php';
        include_once './functions/category-functions.php';
        include './functions/products-functions.php';
        require_once './includes/store/session-start.req-inc.php';
        
        $rowCount = 0;
        $total = 0;
        
        
        ?>
        
        <table class="table table-bordered">
            <?php do{
                $results = productCart($_SESSION['cart'][$rowCount]);
                ?>
            <?php foreach($results as $row):?>
            <tr>
                <td>
                <?php echo $row['product'];?>
                </td>
                <td>
                <?php echo $row['price'];
                    $total += $row['price'];?>
                </td>
            </tr>
            <?php endforeach; $rowCount++?>
            <?php }while($rowCount < count($_SESSION['cart']));?>
        </table>
        Your Total is: <?php echo $total;?>
        <a href="index.php">Go Back</a>
        <a href="clearCart.php">Clear Cart</a>
    </body>
</html>
