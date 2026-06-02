<?php
session_start();

// protect page (only logged-in users)
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Your Trek - Uttara Trek</title>

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
.navbar{
    background:#2d6a4f;
    color:white;
    padding:15px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.navbar h2{
    font-size:22px;
}

.navbar a{
    color:white;
    text-decoration:none;
    margin-left:20px;
    font-weight:bold;
}

/* CONTAINER */
.container{
    width:50%;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.container h2{
    text-align:center;
    margin-bottom:20px;
    color:#2d6a4f;
}

/* INPUTS */
input, select{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    background:#2d6a4f;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#1b4332;
}

/* MESSAGE */
.error{
    color:red;
    text-align:center;
    margin-bottom:10px;
}

.success{
    color:green;
    text-align:center;
    margin-bottom:10px;
}

</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>Uttara Trek</h2>
    <div>
        <a href="choose_trek.php">Treks</a>
        <a href="my_booking.php">My Bookings</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- BOOKING FORM -->
<div class="container">

    <h2>Book Your Trek</h2>

    <!-- PHP MESSAGE -->
    <?php if(isset($_GET['msg'])) { ?>
        <p class="success"><?php echo $_GET['msg']; ?></p>
    <?php } ?>

    <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <form action="booking_process.php" method="POST" onsubmit="return validateForm()">

        <input type="text" name="name" id="name" placeholder="Full Name">

        <input type="email" name="email" id="email" placeholder="Email Address">

        <!-- FIXED: type text (important for phone validation) -->
        <input type="text" name="phone" id="phone" placeholder="Phone Number (10 digits)">

        <select name="trek" id="trek">
            <option value="">Select Trek</option>
            <option>Valley of Flowers</option>
            <option>Har Ki Dun</option>
            <option>Roopkund</option>
            <option>Kedartal</option>
            <option>Kedarkantha</option>
            <option>Brahmatal</option>
            <option>Aancha Top</option>
            <option>Dayara Bugyal</option>
            <option>Badrinath and Kedarnath</option>
            <option>Madmaheshwar</option>
            <option>Tungnath</option>
            <option>Adi Kailash and Om Parvat</option>
            
        </select>

        <input type="number" name="people" id="people" placeholder="Number of People" min="1">

        <button type="submit">Book Now</button>

    </form>

</div>

<!-- JS VALIDATION -->
<script>

function validateForm(){

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let trek = document.getElementById("trek").value;
    let people = document.getElementById("people").value;

    // email regex
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // phone regex (10 digits only)
    let phonePattern = /^[0-9]{10}$/;

    if(name == ""){
        alert("Please enter your name");
        return false;
    }

    if(!emailPattern.test(email)){
        alert("Please enter a valid email");
        return false;
    }

    if(!phonePattern.test(phone)){
        alert("Phone number must be 10 digits");
        return false;
    }

    if(trek == ""){
        alert("Please select a trek");
        return false;
    }

    if(people == "" || people <= 0){
        alert("Enter valid number of people");
        return false;
    }

    return true;
}

</script>

</body>
</html>