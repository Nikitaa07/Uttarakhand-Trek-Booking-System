<?php
session_start();
include "connection.php";

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>

<style>
*{font-family:Arial;margin:0;padding:0;box-sizing:border-box;}

body{background:#eef3fb;}

/* NAVBAR */
.navbar{
    display:flex;
    justify-content:space-between;
    padding:15px;
    background:#2d6a4f;
    color:white;
}

.navbar a{
    color:white;
    text-decoration:none;
    margin-left:20px;
    font-weight:bold;
}

/* TABLE */
.container{
    width:95%;
    margin:20px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

th{
    background:#2d6a4f;
    color:white;
}

.btn{
    padding:5px 10px;
    text-decoration:none;
    color:white;
    border-radius:5px;
}

.accept{background:green;}
.reject{background:red;}
h2{
    margin:10px;
}
</style>

</head>

<body>

<div class="navbar">
    <h2>Admin Panel</h2>
    <a href="logout.php">Logout</a>
</div>

<div class="container">

<h2 style="text-align:center;">All Bookings</h2>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Trek</th>
    <th>People</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$sql = "SELECT * FROM bookings ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['user_email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['trek']; ?></td>
    <td><?php echo $row['people']; ?></td>
    <td><?php echo $row['status']; ?></td>

    <td>

        <?php if($row['status']=="PENDING"){ ?>

            <a class="btn accept"
               href="update_status.php?id=<?php echo $row['id']; ?>&status=CONFIRMED">
               Accept
            </a>

            <a class="btn reject"
               href="update_status.php?id=<?php echo $row['id']; ?>&status=REJECTED">
               Reject
            </a>

        <?php } else { ?>
            <span>Done</span>
        <?php } ?>

    </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>