<?php
include "bootstrap.php";
session_start();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO users_products(user_id, item_id, status) VALUES(:user_id, :item_id, 'Added to cart')";
    $stmt = $PDO->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':item_id', $item_id);
    $stmt->execute();

    header('location: products.php');
}
?>   