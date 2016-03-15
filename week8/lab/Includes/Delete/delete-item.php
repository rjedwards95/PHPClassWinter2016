<?php

$id = filter_input(INPUT_GET, 'id');
$deleteResult = deleteData($id);

if($deleteResult !== true){
    echo "<h3> Data did not delete!</h3>";
}
header("Location: index.php");