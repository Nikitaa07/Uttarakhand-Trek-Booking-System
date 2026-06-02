<?php
session_start();
include "connection.php";

if(isset($_POST['login'])){

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['admin'] = $user;
        header("Location: admin.php");
        exit();

    } else {
        $error = "Invalid Admin Credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<style>
body{
    font-family:Arial;
    background:#eef3fb;
}

.box{
    width:300px;
    margin:100px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
    text-align:center;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
}

button{
    width:100%;
    padding:10px;
    background:#2d6a4f;
    color:white;
    border:none;
    cursor:pointer;
}

.error{
    color:red;
}
</style>

</head>
<body>

<div class="box">

<h2>Admin Login</h2>

<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

</div>

</body>
</html>