<?php
include "bootstrap.php";
session_start();



$email = $_POST['eMail'];
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

$pass = $_POST['password'];
$pass = htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');
$pass = md5($pass);

$first = $_POST['firstName'];
$first = htmlspecialchars($first, ENT_QUOTES, 'UTF-8');

$last = $_POST['lastName'];
$last = htmlspecialchars($last, ENT_QUOTES, 'UTF-8');

$query = "SELECT * from users where email_id=:email";
$stmt = $PDO->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$num = $stmt->rowCount();

if ($num != 0) {
    $m = "Email Already Exists";
    header('location: index.php?error=' . $m);
} else {
    $quer = "INSERT INTO users(email_id, first_name, last_name, password) values(:email, :first, :last, :pass)";
    $stmt = $PDO->prepare($quer);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':first', $first);
    $stmt->bindParam(':last', $last);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();

    echo "New record has id: " . $PDO->lastInsertId();
    $user_id = $PDO->lastInsertId();
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    header('location:products.php');
}

?>