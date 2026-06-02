<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>FAQ - UttaraTrek</title>

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


        /* CONTAINER */
        .container{
            width:70%;
            margin:40px auto;
        }

        h1{
            text-align:center;
            color:#2d6a4f;
            margin-bottom:30px;
        }

        /* FAQ BOX */
        .faq{
            background:white;
            margin-bottom:15px;
            border-radius:8px;
            box-shadow:0 3px 10px rgba(0,0,0,0.1);
            overflow:hidden;
        }

        .question{
            padding:15px;
            cursor:pointer;
            background:#40916c;
            color:white;
            font-weight:bold;
        }

        .answer{
            padding:15px;
            display:none;
            background:#f1faee;
            color:#333;
            line-height:25px;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>UttaraTrek</h2>
    <div>
        <a href="choose_trek.php">Treks</a>
        <a href="contact.php">Contact Us</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <h1>Frequently Asked Questions</h1>

    <div class="faq">
        <div class="question">1. How do I book a trek?</div>
        <div class="answer">Select any trek from the list and click on Book Now button to proceed with booking.</div>
    </div>

    <div class="faq">
        <div class="question">2. Is trekking safe in Uttarakhand?</div>
        <div class="answer">Yes, all treks are guided by trained professionals with proper safety measures.</div>
    </div>

    <div class="faq">
        <div class="question">3. What is the best time for trekking?</div>
        <div class="answer">Summer (May–June) and Winter (Dec–Feb) are the best seasons for trekking.</div>
    </div>

    <div class="faq">
        <div class="question">4. Do I need trekking experience?</div>
        <div class="answer">No, many beginner-friendly treks are available for first-time trekkers.</div>
    </div>

    <div class="faq">
        <div class="question">5. What should I carry for trek?</div>
        <div class="answer">Trekking shoes, warm clothes, water bottle, raincoat, and basic medicines.</div>
    </div>

    <div class="faq">
        <div class="question">6. Are meals included in trek package?</div>
        <div class="answer">Yes, most trek packages include vegetarian meals during the trek.</div>
    </div>

    <div class="faq">
        <div class="question">7. Can I cancel my booking?</div>
        <div class="answer">Yes, cancellation is allowed as per the company policy before trek start date.</div>
    </div>

    <div class="faq">
        <div class="question">8. Is mobile network available on trek?</div>
        <div class="answer">In most high altitude treks, network is limited or not available.</div>
    </div>

</div>

<!-- SIMPLE JS -->
<script>

let q = document.getElementsByClassName("question");

for(let i=0;i<q.length;i++){

    q[i].onclick = function(){

        let ans = this.nextElementSibling;

        if(ans.style.display == "block"){
            ans.style.display = "none";
        }else{
            ans.style.display = "block";
        }
    }
}

</script>

</body>
</html>