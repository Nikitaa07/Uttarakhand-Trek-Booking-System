<?php
session_start();
include "connection.php";

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$user_email = $_SESSION['user'];

$sql = "SELECT * FROM bookings WHERE user_email='$user_email' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings - Uttara Trek</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#eef3fb;
}

/* NAVBAR */
/* NAVBAR */
.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 40px;
    background:rgb(34, 91, 65);
    color:white;
    height: 70px
}

/* TITLE */
.navbar h2{
    font-size:22px;
    font-weight:bold;
    color: white;
}

/* LINKS */
.navbar a{
    color:white;
    text-decoration:none;
    margin-left:20px;
    font-weight:bold;
    padding:6px 10px;
    border-radius:6px;
    transition:0.3s;
}
h2{
    text-align:center;
    margin:25px 0;
    color:#1b4332;
    font-size:30px;
    font-weight:700;
    letter-spacing:1px;
}
/* HOVER EFFECT */

/* TABLE */
.table-container{
    width:90%;
    margin:auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

th{
    background:#2d6a4f;
    color:white;
}

/* STATUS */
.status{
    padding:5px 10px;
    border-radius:15px;
    font-size:13px;
    font-weight:bold;
}

.pending{
    background:#fff3cd;
    color:#856404;
}

.confirmed{
    background:#d4edda;
    color:#155724;
}

.rejected{
    background:#f8d7da;
    color:#721c24;
}

/* BUTTON */
.cancel-btn{
    padding:6px 10px;
    background:red;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:12px;
    text-decoration:none;
}

.cancel-btn:hover{
    background:darkred;
}

.no-btn{
    color:#999;
    font-size:12px;
}

/* TREK IMAGE (optional simple icon style) */
.trek-img{
    width:40px;
    height:40px;
    border-radius:50%;
    object-fit:cover;
}

</style>
</head>

<body>

<!-- NAVBAR -->

<!-- NAVBAR -->
<div class="navbar">
    <h2>Uttara Trek</h2>

    <div>
        <a href="choose_trek.php">Treks</a>
        <a href="booking.php">Book Trek</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<h2>My Bookings</h2>

<div class="table-container">

<?php if(mysqli_num_rows($result) > 0){ ?>

<table>

<tr>
    <th>ID</th>
    <th>Trek</th>
    <th>Name</th>
    <th>Phone</th>
    <th>People</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['trek']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['people']; ?></td>

    <td>
        <?php if($row['status']=="PENDING"){ ?>
            <span class="status pending">PENDING</span>
        <?php } else if($row['status']=="CONFIRMED"){ ?>
            <span class="status confirmed">CONFIRMED</span>
        <?php } else { ?>
            <span class="status rejected">REJECTED</span>
        <?php } ?>
    </td>

    <td><?php echo $row['created_at']; ?></td>

    <td>
        <?php if($row['status']=="PENDING"){ ?>
            <a class="cancel-btn"
               href="cancel_booking.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Are you sure you want to cancel this booking?')">
               Cancel
            </a>
        <?php } else { ?>
            <span class="no-btn">Not allowed</span>
        <?php } ?>
    </td>

</tr>

<?php } ?>

</table>

<?php } else { ?>

    <h3 style="text-align:center; color:#666;">No bookings found</h3>

<?php } ?>

</div>

</body>
</html>