<?php
session_start();
include "connection.php";

// user must be logged in
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$user_email = $_SESSION['user'];

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$trek = trim($_POST['trek']);
$people = $_POST['people'];

// validation
if($name == "" || $phone == "" || $trek == "" || $people <= 0){
    header("Location: booking.php?error=All fields required");
    exit();
}

if(!preg_match("/^[0-9]{10}$/", $phone)){
    header("Location: booking.php?error=Invalid phone number");
    exit();
}

// insert booking
$sql = "INSERT INTO bookings(user_email,name,phone,trek,people,status)
VALUES('$user_email','$name','$phone','$trek','$people','PENDING')";

if(mysqli_query($conn,$sql)){
    header("Location: booking.php?msg=Booking successful! Status: PENDING");
} else {
    header("Location: booking.php?error=Booking failed");
}
?>