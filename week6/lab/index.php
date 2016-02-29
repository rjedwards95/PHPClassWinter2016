<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping</title>
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
        $categories = getAllCategories();
        
        
        if(isPostRequest()){
            $_SESSION['cart'][] = filter_input(INPUT_POST, 'product_id');
            $id = filter_input(INPUT_GET, 'category_id');
            $results = searchProduct($id);
        }
        if (isGetRequest()) {
            $id = filter_input(INPUT_GET, 'category_id');
            $results = searchProduct($id);
        }else{
            $id = ' ';
        }
        ?>
        <?php include './includes/store/header.php'; ?>
        <?php include './includes/store/storeTable.php'; ?>
    </body>
</html>
