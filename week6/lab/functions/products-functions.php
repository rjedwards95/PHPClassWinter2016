<?php

/*
 * products
 * product_id
 * category_id
 * product
 * price
 * image
 */


//Creates product in the database.
function createProduct($category_id, $product, $price, $image ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price, image = :image ");

    $binds = array(
        ":category_id" => $category_id,
        ":product" => $product,
        ":price" => $price,
        ":image" => $image
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
    
}

//Checks if the product is valid.
function isValidProduct($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}

//Checks if the price is valid.
function isValidPrice($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}

//Pulls all product data from the database.
function getAllProducts() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products JOIN categories on products.category_id = categories.category_id");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

//Deletes product from database.
function deleteProduct($id) {
    $db = dbconnect();

    $stmt = $db->prepare("DELETE FROM products where product_id = :id");

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

//Pulls data from specific product to pupulate the UPDATE page.
function specificProduct($id) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products JOIN categories on products.category_id = categories.category_id where product_id = :id");
    $binds = array(
        ":id" => $id
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

function updateProduct($product, $category_id, $price, $image, $id) {
    $db = dbconnect();
    $stmnt = $db->prepare("UPDATE products SET product = :product, price = :price, image = :image, category_id = :cat_id WHERE product_id = :id");

    $binds = array(
        ":id" => $id,
        ":product" => $product,
        ":price" => $price,
        ":image" => $image,
        ":cat_id" => $category_id
    );

    $message = 'Update failed';
    if ($stmnt->execute($binds) && $stmnt->rowCount() > 0) {
        $message = 'Update Complete';
    }
    return $message;
}

//Pulls products from specific category to pupulate the shopping page.
function searchProduct($id) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products WHERE category_id = :id");
    $binds = array(
        ":id" => $id
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

//Pulls products from specific category to pupulate the shopping page.
function productCart($id) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products WHERE product_id = :id");
    $binds = array(
        ":id" => $id
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}