<?php
include './Includes/Functions/functions.php';

$user = $params['user'];

if (empty($user['username']) || empty($user['password'])) {
    $_SESSION['ERROR'] = "Please enter all fields";
    header("Location: login.php");
    die;
}

$username = $user['username'];
$password = $user['password'];

$check = $db->query("SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password'")->fetch();



if (empty($check)) {
    $_SESSION['ERROR'] = "Invalid Username or Password";
    header("Location: login.php");
    die;
} else {

    $_SESSION['user'] = $check;
    $user_id = $check['id'];

    header("Location: index.php");
    die;
}