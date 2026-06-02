<?php
include "connection.php";

$id = $_GET['id'];

// only allow cancel if pending
mysqli_query($conn, "UPDATE bookings SET status='CANCELLED' WHERE id=$id");

header("Location: my_booking.php");
?>