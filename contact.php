<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - UttaraTrek</title>

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
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 40px;
            background:#2d6a4f;
            color:white;
        }

        .navbar a{
            color:white;
            text-decoration:none;
            margin-left:20px;
            font-weight:bold;
        }

        /* HERO IMAGE */
        .hero{
            position:relative;
        }

        .hero img{
            width:100%;
            height:500px;
            object-fit:cover;
        }

        .overlay{
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.5);
        }

        .hero-text{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            color:white;
            text-align:center;
        }

        .hero-text h1{
            font-size:50px;
        }

        /* CONTACT SECTION */
        .container{
            width:70%;
            margin:40px auto;
            text-align:center;
        }

        .box{
            background:white;
            padding:25px;
            margin-bottom:20px;
            border-radius:10px;
            box-shadow:0 3px 10px rgba(0,0,0,0.1);
        }

        .box h2{
            color:#2d6a4f;
            margin-bottom:10px;
        }

        .box p{
            font-size:16px;
            line-height:25px;
            color:#333;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>UttaraTrek</h2>
    <div>
        <a href="choose_trek.php">Treks</a>
        <a href="faq.php">FAQ</a>

        <!-- ✅ LOGOUT ADDED -->
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- HERO IMAGE -->
<div class="hero">

    <img src="trek_image/contact.jpg" alt="Contact Us">

    <div class="overlay"></div>

    <div class="hero-text">
        <h1>CONTACT US</h1>
        <p>We are here to help you plan your trek</p>
    </div>

</div>

<!-- CONTACT DETAILS -->
<div class="container">

    <div class="box">
        <h2>📍 Address</h2>
        <p>UttaraTrek Office, Dehradun, Uttarakhand, India</p>
    </div>

    <div class="box">
        <h2>📞 Phone</h2>
        <p><a href="tel:+919876543210" style="color:#333; text-decoration:none;">+91 98765 43210</a></p>
    </div>

    <div class="box">
        <h2>📧 Email</h2>
        <p><a href="mailto:support@uttaratrek.com" style="color:#333; text-decoration:none;">support@uttaratrek.com</a></p>
    </div>

    <div class="box">
        <h2>⏰ Working Hours</h2>
        <p>Monday - Saturday: 9:00 AM to 6:00 PM</p>
    </div>

</div>

</body>
</html>