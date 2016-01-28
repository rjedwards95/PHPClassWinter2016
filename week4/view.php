<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Corps</title>
        
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        include "./include/dbUtil.php";
        
        $action = "";
        
        if(isGetRequest()){
        $action = filter_input(INPUT_GET, 'action');
        $search = filter_input(INPUT_GET, 'search');
        $column = filter_input(INPUT_GET, 'column');
        $columnSort = filter_input(INPUT_GET, 'columnSort');
        $order = filter_input(INPUT_GET, 'order');
        }
        
            
            
                if($action === 'search'){
                   $results = searchDB($column, $search);
                }
                elseif($action === 'sort'){
                    $results = sortDB($columnSort, $order);
                }
                else{
                   $results = dbAll();
                }
                
        
        ?>
        <table border="1" class="table table-striped">
            <tr>
                <th>
                    Search
                </th>
                <th>
                    Sort
                </th>
            </tr>
            <tr>
                <td>
                    <?php include "./include/searchForm.php";?>
                </td>
                <td>
                    <?php include "./include/sortForm.php";?>
                </td>
            </tr>
        </table>
        
        
        
        <h1>
            Corporations Table
        </h1>
        <h3>
            <?php
            $rowcount = count($results);
            if($rowcount > 0){
                echo $rowcount. " number of rows.";
            }else{
                echo "No results found";
            }
            ?>
        </h3>

        <table border="1" class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Corp. Name</th>
                <th>Date Added</th>
                <th>Corp. Email</th>
                <th>Corp. Zip</th>
                <th>Corp. Owner</th>
                <th>Corp. Phone Number</th>
            </tr>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date('m/d/Y', strtotime($row['incorp_dt'])); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
