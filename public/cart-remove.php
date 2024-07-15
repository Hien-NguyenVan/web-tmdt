<?php

include "bootstrap.php";
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    

    // prepare SQL statement with placeholders
    $sql = "DELETE FROM users_products WHERE item_id = :item_id AND user_id = :user_id";
    $stmt = $conn->prepare($sql);

    // bind parameter values to placeholders
    $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // execute statement
    $stmt->execute();

    header("location:cart.php");
}

?>
