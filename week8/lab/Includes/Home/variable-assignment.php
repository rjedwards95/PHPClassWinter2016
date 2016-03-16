<?php

//Assigns the form variables to upload.

$results = allData($_SESSION['id']);
if (isPostRequest()) {
    if(filter_input(INPUT_POST, 'address_group_id')!= null){
    $selectedGroup = filter_input(INPUT_POST,'address_group_id');
    $results = groupData($_SESSION['id'], $selectedGroup);
    }elseif(filter_input(INPUT_POST, 'searchq')!= null){
        $searchq = filter_input(INPUT_POST, 'searchq');
        $selectedCol = filter_input(INPUT_POST, 'col');
        $results = searchData($_SESSION['id'], $searchq,$selectedCol);
    }
    
} else {
    
}
