<?php
session_start();

// remove all session variables
session_unset();

// destroy session completely
session_destroy();

// redirect to home page (index.php)
header("Location: index.php");
exit();
?>