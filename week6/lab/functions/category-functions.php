<?php

/*
 * -categories
 * category_id
 * category
 */

function createCategory($value) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO categories SET category = :category");

    $binds = array(
        ":category" => $value
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }

    return false;
}

function getAllCategories() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM categories");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

function isValidCategory($value) {
    if (empty($value)) {
        return false;
    }

    if (preg_match("/^[a-zA-Z]+$/", $value) == false) {
        return false;
    }

    return true;
}

function updateCategory($category, $id) {
    $db = dbconnect();
    $stmnt = $db->prepare("UPDATE categories SET category = :category WHERE category_id = :id");

    $binds = array(
        ":id" => $id,
        ":category" => $category
    );

    $message = 'Update failed';
    if ($stmnt->execute($binds) && $stmnt->rowCount() > 0) {
        $message = 'Update Complete';
    }
    return $message;
}

function specificCategory($id) {
    $db = dbconnect();
    $stmnt = $db->prepare("SELECT * FROM categories where category_id = :id");

    $binds = array(
        ":id" => $id
    );

    $result = array();

    if ($stmnt->execute($binds) && $stmnt->rowCount() > 0) {
        $result = $stmnt->fetch(PDO::FETCH_ASSOC);
        $category = $result['category'];
    } else {
        header('Location: index.php');
        die('ID not found');
    }
    return $category;
}

function deleteCategory($id) {
    $db = dbconnect();

    $stmt = $db->prepare("DELETE FROM categories where category_id = :id");

    $binds = array(
        ":id" => $id
    );

    $isDeleted = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $isDeleted = true;
    } else {
        header('Location: index.php');
        die('ID not found');
    }
    return $isDeleted;
}
