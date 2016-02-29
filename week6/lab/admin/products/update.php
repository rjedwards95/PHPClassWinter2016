<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Products CRUD</title>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        include_once '../../includes/ico.html.php';
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include_once '../../functions/products-functions.php';
        include_once '../../functions/utils-function.php';
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

        $id = filter_input(INPUT_GET, 'id');
        $categories = getAllCategories();

        if (isPostRequest()) {
            $product = filter_input(INPUT_POST, 'product');
            $category_id = filter_input(INPUT_POST, 'category_id');
            $price = filter_input(INPUT_POST, 'price');
            if($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE){
                $image = filter_input(INPUT_POST, 'origImg');
            }else{
                include '../../includes/products/uploadCheck.php';
                $image = $FN;
            }
            

            $errors = array();

            if (!isValidProduct($product)) {
                $errors[] = 'Product is not Valid';
            }

            if (!isValidPrice($price)) {
                $errors[] = 'Price is not Valid';
            }

            if (count($errors) == 0) {
                
                $message = updateProduct($product, $category_id, $price, $image, $id);
            }
        }

        $results = specificProduct($id);
        ?>

        <h1>Edit Product</h1>

        <?php if (isset($errors) && count($errors) > 0) : ?>
            <ul>
    <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>



        <p>
<?php
if (isset($message)) {
    echo $message;
}
?>
        </p>

        <form enctype="multipart/form-data" method="post" action="#">  
            <table border="1" class="table table-striped">
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
                <tr>
                    <?php foreach ($results as $row): ?>
                        <td><input type="text" value="<?php echo $row['product']; ?>" name="product" /></td>
                        <td><select name="category_id">
                        <?php foreach ($categories as $catRow): ?>
                                    <option <?php if($catRow['category_id'] == $row['category_id']){ echo "selected = 'selected'";}?> value="<?php echo $catRow['category_id']; ?>">
                                    <?php echo $catRow['category']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select></td>
                        <td><input type="text" value="<?php echo $row['price']; ?>" name="price" /></td>
                        <td><input type="file" name="image" />
                            <input type="hidden" value="<?php echo $row['image']; ?>" name="origImg" />
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
            <input type="hidden" name="img" value="<?php echo $id ?>" />
            <input class ="btn btn-default" type="submit" value="Submit" />
            <a class="btn btn-primary" href="index.php"> Go back </a>
        </form> 
    </body>
</html>
