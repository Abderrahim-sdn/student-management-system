<?php

session_start();
require "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = $conn->prepare("SELECT password FROM admin WHERE username=?");
$query->bind_param("s", $username);
$query->execute();
$query->store_result();

if ($query->num_rows === 1) {
    $query->bind_result($hashed);
    $query->fetch();

    if (password_verify($password, $hashed)) {
        $_SESSION['admin'] = $username;
        header("Location: ../dashboard.php");
        exit();
    }
    else{
        header("Location: ../index.php?error=1&username=".urlencode($username));
        exit();
    }
} 
else{
    header("Location: ../index.php?error=1&username=".urlencode($username));
    exit();
}
?>