<?php


function check_if_added_to_cart($item_id) {
    
    $user_id = $_SESSION['user_id']; 
    require("../public/bootstrap.php");

    $query = "SELECT * FROM users_products WHERE item_id=:item_id AND user_id=:user_id AND status='Added to cart'";
    $stmt = $PDO->prepare($query);
    $stmt->bindParam(':item_id', $item_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        return 1;
    } else {
        return 0;
    }
}

?>