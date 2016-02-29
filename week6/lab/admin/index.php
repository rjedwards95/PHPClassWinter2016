<!DOCTYPE html>
<html>
    <head>
        <?php 
        require_once '../includes/session-start.req-inc.php'; 
        include '../includes/ico.html.php';
        ?>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <meta charset="UTF-8">
        <title>Administration</title>
    </head>
    <body>
       <?php
            
            include_once '../functions/dbconnect.php';
            include_once '../functions/login-function.php';
            include_once '../functions/utils-function.php';
            
            $logout = false;
        
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'pass');
                $logout = filter_input(INPUT_POST, 'logout');
                
                if ( isValidUser($email, $password) ) {
                    $_SESSION['isValidUser'] = true;                    
                } else {
                    $results = 'Sorry please try again';
                }
               
            }
            
            
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) {
                include '../includes/admin-links.html.php';
            }
            
        ?>
        
        <?php include '../includes/results.html.php'; ?>
       <?php if(!isset($_SESSION['isValidUser'])){
         include '../includes/loginform.html.php';
       }else{
           include '../includes/logoutform.html.php';
           logOut($logout);
       }
?>
    </body>
</html>
