<?php
session_start();
$conn=mysqli_connect("localhost", "root", "", "school");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['login'])){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);

$sql="select * from admin where username='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>1){
    $row=mysqli_fetch_assoc($result);
    if(password_verify($password,$row['password'])){
        $_SESSION['username']=$row['username'];
        header("Location:admin.php");
    
     } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Invalid username";
    }

}

 
 ?>

 <!DOCTYPE html>
 <html>
    <body>
        <h2>Login</h2>
        <form action="" method="post">
        username: <input type="text" name="username" required><br><br>
        password: <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
        </form>
    </body>
 </html>