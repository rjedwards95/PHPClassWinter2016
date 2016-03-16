<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Address Book</title>
        <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        
        require_once "./Includes/session-start.php";
        include './Functions/util.php';
        include './Functions/Database/dbconnect.php';
        include './Functions/Database/dbfunctions.php';
        
        if (!isset($_SESSION['login'])){
        $_SESSION['login'] = false;
        }
        $view = filter_input(INPUT_GET, 'view'); 
        if($view == 'login'){
            include_once './Includes/Login/login-form.html.php';
            include_once './Includes/Login/variable-assignment.php';
            include_once './Functions/Login/login-runfunction.php';
        }
        elseif($view == 'add'){
            $title = "Add";
            require "../lab/Includes/header.html.php";
            include_once './Functions/Add/add-functions.php';
            include_once './Includes/Add/variable-assignment.php';
            include_once "./Includes/Add/add-form.php";
        }
        elseif($view == 'update'){
            $title = "Update";
            require "../lab/Includes/header.html.php";
            include_once './Includes/View/variable-assignment.php';
            include_once './Includes/Update/update-form.php';
            include_once './Includes/Update/variable-assignment.php';
        }
        elseif($view == 'delete'){
            $title = "Delete";
            require "../lab/Includes/header.html.php";
            include_once './Includes/Delete/delete-item.php';
        }
        elseif($view == 'logout'){
            session_destroy();
            header('Location:index.php');
        }
        elseif($view == 'new'){
            include_once './Includes/New/create-account.php';
            include_once './Includes/Login/variable-assignment.php';
            include_once './Includes/New/addUser.php';
            include_once './Functions/Login/login-runfunction.php';
        }elseif ($view == 'view') {
            $title = 'View';
            require "../lab/Includes/header.html.php";
            include_once './Includes/View/variable-assignment.php';
            include_once './Includes/View/view-table.php';
        }else{
            $title = "Home";
            require "../lab/Includes/header.html.php";
            if(!empty($_SESSION['id'])){
            include_once './Includes/Home/variable-assignment.php';
            include_once './Includes/Home/search-bar.php';
            include_once "./Includes/Home/entry-table.php";
            }
        }
        
        
        ?>
        <input type="hidden" value="<?php echo $_SESSION['id'];?>"/>
    </body>
</html>
