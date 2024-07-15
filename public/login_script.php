<?php
include "bootstrap.php";



$email = $_POST['lemail'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$password = $_POST['lpassword'];
$password = filter_var($password, FILTER_SANITIZE_STRING);
$password = md5($password);

$stmt = $PDO->prepare('SELECT id, email_id, password FROM users WHERE email_id = ? AND password = ?');
$stmt->execute([$email, $password]);
$user = $stmt->fetch();

if (!$user) {
    $m = "Please enter correct E-mail id and Password";
    header('Location: index.php?errorl=' . $m);
    exit;
} else {
    session_start();
    $_SESSION['email'] = $user['email_id'];
    $_SESSION['user_id'] = $user['id'];
    header('Location: products.php');
    exit;
}


?>