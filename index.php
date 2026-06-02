<?php
session_start();

/* redirect if already logged in */
if(isset($_SESSION['user'])){
    header("Location: choose_trek.php");
    exit();
}

/* LOGIN ERROR ONLY */
$loginErrorMessage = "";

if(isset($_SESSION['login_error'])){
    $loginErrorMessage = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Uttara Trek</title>

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

.navbar button{
    padding:8px 15px;
    border:none;
    background:white;
    color:#2d6a4f;
    cursor:pointer;
    border-radius:5px;
    font-weight:bold;
}

/* HERO */
.hero{
    height:100vh;
    background:url('trek_image/Uttarakhand.jpeg');
    background-size:cover;
    background-position:center;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:white;
}

.hero h1{
    font-size:55px;
}

.hero p{
    font-size:20px;
    margin-top:15px;
}

.hero button{
    margin-top:25px;
    padding:12px 25px;
    border:none;
    background:#ffb703;
    cursor:pointer;
    font-weight:bold;
    font-size:17px;
    border-radius:5px;
}

/* MODAL */
.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    justify-content:center;
    align-items:center;
}

.modal-box{
    background:white;
    width:430px;
    padding:25px;
    border-radius:10px;
    position:relative;
}

.modal-box h2{
    text-align:center;
    margin-bottom:15px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
}

.btn{
    width:100%;
    padding:12px;
    background:#2d6a4f;
    color:white;
    border:none;
    cursor:pointer;
    border-radius:5px;
}

.close{
    position:absolute;
    right:15px;
    top:10px;
    cursor:pointer;
    font-size:20px;
}

/* ERROR */
.error-message{
    color:red;
    text-align:center;
    margin-bottom:10px;
    font-weight:bold;
}

/* SWITCH */
.switch{
    text-align:center;
    margin-top:10px;
    font-size:13px;
}

.switch a{
    color:#2d6a4f;
    font-weight:bold;
    text-decoration:none;
}

</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>Uttara Trek</h2>
    <button onclick="openLoginModal()">Login</button>
</div>

<!-- HERO -->
<div class="hero">

    <div>
        <h1>Explore Uttarakhand Treks</h1>
        <p>Book your adventure in the Himalayas</p>

        <button onclick="openLoginModal()">Start Journey</button>
    </div>

</div>

<!-- MODAL -->
<div class="modal" id="authModal">

    <div class="modal-box">

        <span class="close" onclick="closeModal()">×</span>

        <!-- LOGIN FORM -->
        <form id="loginForm" action="login.php" method="POST">

            <h2>Login</h2>

            <!-- LOGIN ERROR ONLY HERE -->
            <?php if(!empty($loginErrorMessage)) { ?>
                <p class="error-message"><?php echo $loginErrorMessage; ?></p>
            <?php } ?>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button class="btn" type="submit">Login</button>

            <div class="switch">
                No account?
                <a href="#" onclick="showRegisterForm(); return false;">Register</a>
            </div>

        </form>

        <!-- REGISTER FORM -->
        <form id="registerForm" action="register.php" method="POST" style="display:none;">

            <h2>Register</h2>

            <input type="text" name="name" placeholder="Name" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button class="btn" type="submit">Create Account</button>

            <div class="switch">
                Already have account?
                <a href="#" onclick="showLoginForm(); return false;">Login</a>
            </div>

        </form>

    </div>

</div>

<script>

/* OPEN LOGIN MODAL */
function openLoginModal(){
    document.getElementById("authModal").style.display="flex";
    showLoginForm();
}

/* CLOSE MODAL */
function closeModal(){
    document.getElementById("authModal").style.display="none";
}

/* SHOW LOGIN FORM */
function showLoginForm(){
    document.getElementById("loginForm").style.display="block";
    document.getElementById("registerForm").style.display="none";
}

/* SHOW REGISTER FORM */
function showRegisterForm(){
    document.getElementById("loginForm").style.display="none";
    document.getElementById("registerForm").style.display="block";
}

/* AUTO OPEN IF ERROR EXISTS */
window.onload = function(){
    <?php if(!empty($loginErrorMessage)) { ?>
        document.getElementById("authModal").style.display="flex";
        showLoginForm();
    <?php } ?>
}

/* CLICK OUTSIDE CLOSE */
window.onclick = function(e){
    let modal = document.getElementById("authModal");
    if(e.target == modal){
        modal.style.display="none";
    }
}

</script>
<!-- FOOTER -->
<footer style="
    background:#2d6a4f;
    color:white;
    text-align:center;
    padding:15px;
    margin-top:0;
    font-size:14px;
">
    © 2026 Uttara Trek | Uttarakhand Trek Booking System
</footer>
</body>
</html>