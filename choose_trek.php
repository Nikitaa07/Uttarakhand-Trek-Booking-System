<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Trek</title>

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

        /* FILTER BUTTONS */
        .filters{
            text-align:center;
            margin:25px 0;
        }

        .filters button{
            padding:10px 15px;
            margin:5px;
            border:none;
            background:#40916c;
            color:white;
            border-radius:5px;
            cursor:pointer;
            transition:0.3s;
        }

        /* ACTIVE BUTTON */
        .filters button.active{
            background:#1b4332;
            transform:scale(1.05);
        }

        /* CARDS CONTAINER */
        .container{
            width:90%;
            margin:auto;
            display:flex;
            flex-wrap:wrap;
            justify-content:center;
            gap:20px;
        }

        /* CARD LINK */
        .card-link{
            text-decoration:none;
            color:inherit;
        }

        /* CARD FIXED SIZE */
        .card{
            width:350px;
            height:300px;   /* SAME SIZE FIX */
            background:white;
            border-radius:10px;
            box-shadow:0 3px 10px rgba(0,0,0,0.1);
            overflow:hiden;
            text-align:center;
            cursor:pointer;
            transition:0.3s;

            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .card:hover{
            transform:scale(1.03);
        }

        .card img{
            width:100%;
            height:200px;   
            object-fit:cover;
        }

        .card h3{
            margin:10px 0;
            color:#2d6a4f;
        }

        .price{
            margin-bottom:10px;
            font-weight:bold;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>UttaraTrek</h2>
    <div>
        <a href="my_booking.php">My Bookings</a>
        <a href="faq.php">FAQ</a>
        <a href="contact.php">Contact Us</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- FILTER BUTTONS -->
<div class="filters">

    <button onclick="filterTrek(event,'all')" class="active">All</button>
    <button onclick="filterTrek(event,'summer')">Summer</button>
    <button onclick="filterTrek(event,'winter')">Winter</button>
    <button onclick="filterTrek(event,'spiritual')">Spiritual</button>

</div>

<!-- CARDS -->
<div class="container">

    <!-- SUMMER -->
    <a href="trek/valley_of_flowers.php" class="card-link">
        <div class="card summer">
            <img src="trek_image/valley_of_flowers.jpg">
            <h3>Valley of Flowers</h3>
            <p class="price">₹ 13,000</p>
        </div>
    </a>

    <a href="trek/har_ki_dun.php" class="card-link">
        <div class="card summer">
            <img src="trek_image/har_ki_dun.avif">
            <h3>Har Ki Dun Trek</h3>
            <p class="price">₹ 14,000</p>
        </div>
    </a>

    <a href="trek/roopkund.php" class="card-link">
        <div class="card summer">
            <img src="trek_image/roopkund.jpg">
            <h3>Roopkund Trek</h3>
            <p class="price">₹ 16,000</p>
        </div>
    </a>

    <a href="trek/kedartal.php" class="card-link">
        <div class="card summer">
            <img src="trek_image/kedartal.webp">
            <h3>Kedartal Trek</h3>
            <p class="price">₹ 20,000</p>
        </div>
    </a>

    <!-- WINTER -->
    <a href="trek/kedarkantha.php" class="card-link">
        <div class="card winter">
            <img src="trek_image/kedrakantha.jpg">
            <h3>Kedarkantha Trek</h3>
            <p class="price">₹ 10,000</p>
        </div>
    </a>

    <a href="trek/brahmatal.php" class="card-link">
        <div class="card winter">
            <img src="trek_image/brahmatal.webp">
            <h3>Brahmatal</h3>
            <p class="price">₹ 11,000</p>
        </div>
    </a>

    <a href="trek/dayara_bugyal.php" class="card-link">
        <div class="card winter">
            <img src="trek_image/dyara_bugyal.jpg">
            <h3>Dayara Bugyal Trek</h3>
            <p class="price">₹ 12,000</p>
        </div>
    </a>

    <a href="trek/aanchatop.php" class="card-link">
        <div class="card winter">
            <img src="trek_image/aancha.jpg">
            <h3>Aancha Top</h3>
            <p class="price">₹ 11,000</p>
        </div>
    </a>

    <!-- SPIRITUAL -->
    <a href="trek/badrinath_kedarnath.php" class="card-link">
        <div class="card spiritual">
            <img src="trek_image/Badrinath_Kedarnath.jpg">
            <h3>Badrinath and Kedarnath Yatra</h3>
            <p class="price">₹ 12,000</p>
        </div>
    </a>

    <a href="trek/madmaheshwar.php" class="card-link">
        <div class="card spiritual">
            <img src="trek_image/madhyamaheshwar.jpg">
            <h3>Madmaheshwar Trek</h3>
            <p class="price">₹ 12,000</p>
        </div>
    </a>

    <a href="trek/adi_kailash.php" class="card-link">
        <div class="card spiritual">
            <img src="trek_image/adi_kailash.webp">
            <h3>Adi Kailash and Om Parvat Trek</h3>
            <p class="price">₹ 20,000</p>
        </div>
    </a>

    <a href="trek/tungnath.php" class="card-link">
        <div class="card spiritual">
            <img src="trek_image/tungnath.jpg">
            <h3>Tungnath Yatra</h3>
            <p class="price">₹ 8,000</p>
        </div>
    </a>

</div>

<!-- BASIC JS -->
<script>

function filterTrek(event, category){

    let cards = document.getElementsByClassName("card");
    let buttons = document.querySelectorAll(".filters button");

    // remove active class
    buttons.forEach(btn => btn.classList.remove("active"));

    // add active class to clicked button
    event.target.classList.add("active");

    for(let i=0;i<cards.length;i++){

        if(category == "all"){
            cards[i].parentElement.style.display = "block";
        }
        else{
            if(cards[i].classList.contains(category)){
                cards[i].parentElement.style.display = "block";
            }else{
                cards[i].parentElement.style.display = "none";
            }
        }
    }
}

</script>

</body>
</html>