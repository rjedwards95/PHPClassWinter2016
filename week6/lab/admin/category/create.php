<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Categories CRUD</title>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        include_once '../../includes/ico.html.php';
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include '../../functions/utils-function.php';
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
        
       
        
         if ( isPostRequest() ) {
            
            $category = filter_input(INPUT_POST, 'category');
            $errors = array();
            
            if ( ! isValidCategory($category) ) {
                 $errors[] = 'Category is not valid';
            }
            
            if ( count($errors) == 0 ) {
                
                if ( createCategory($category) ) {
                    $results = 'Category added';
                } else {
                    $results = 'Category was not added';
                }
                               
            } 
            
            
        }
        
        
        ?>
        
         <h1>Add Category</h1>
        
          <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
         
       <?php include '../../includes/results.html.php'; ?>
               
        <form method="post" action="#">
            Category Name : <input type="text" name="category" value="" />
            <input type="submit" value="Submit" />
        </form>
         <br/>
         <a class="btn btn-primary" href="index.php"> Go back </a>
    </body>
</html>
