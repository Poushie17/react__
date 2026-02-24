<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
echo "welcome " .$_SESSION['username'];
?>
<a href="logout.php">logout</a>

