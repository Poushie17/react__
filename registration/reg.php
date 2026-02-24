<?php
$conn = mysqli_connect("localhost", "root", "", "school");
if (!$conn) die("Connection failed: " . mysqli_connect_error());

if(isset($_POST['register'])){
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $contact = trim($_POST['contact']);

    // Insert into DB
    $sql = "INSERT INTO users (username, password, email, name, contact) 
            VALUES ('$username', '$password', '$email', '$name', '$contact')";
    
    if(mysqli_query($conn, $sql)){
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <script>
        function validateForm() {
            let username = document.forms["regForm"]["username"].value;
            let password = document.forms["regForm"]["password"].value;
            let email = document.forms["regForm"]["email"].value;
            let name = document.forms["regForm"]["name"].value;
            let contact = document.forms["regForm"]["contact"].value;

            if(username === "" || password === "" || email === "" || name === "" || contact === ""){
                alert("All fields are required!");
                return false;
            }

            if(!email.includes("@")){
                alert("Enter a valid email");
                return false;
            }

            if(isNaN(contact) || contact.length < 10){
                alert("Enter a valid contact number");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<h1>Register</h1>
<form name="regForm" action="" method="post" onsubmit="return validateForm()">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Contact: <input type="text" name="contact"><br><br>
    <button type="submit" name="register">Register</button>
</form>
</body>
</html>

<!-- login.php -->
 <?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "school");
if(!$conn) die("Connection failed: " . mysqli_connect_error());

if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Invalid username!";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<h1>Login</h1>
<form action="" method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>
<?php if(isset($error)) echo $error; ?>
</body>
</html>

<!-- dashbord.php -->
 <?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>
<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
<a href="logout.php">Logout</a>

<!-- logout.php -->
 <?php
session_start();
session_destroy();
header("Location: login.php");
exit();