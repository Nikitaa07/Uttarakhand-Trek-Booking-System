<?php
session_start();
include "connection.php";

$email = $_POST['email'];
$password = $_POST['password'];

/* check user exists */
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    if($row['password'] == $password){

        $_SESSION['user'] = $email;
        unset($_SESSION['login_error']);

        header("Location: choose_trek.php");
        exit();

    } else {

        $_SESSION['login_error'] = "Incorrect Password";
        header("Location: index.php");
        exit();
    }

} else {

    $_SESSION['login_error'] = "User does not exist";
    header("Location: index.php");
    exit();
}
?>