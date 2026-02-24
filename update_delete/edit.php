<?php
$conn = mysqli_connect("localhost","root","","school");
if(!$conn){ die("Connection failed: ".mysqli_connect_error()); }

// 1. Get the student ID
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// 2. Fetch existing student data
$sql = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 3. Handle form submission
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $update_sql = "UPDATE students SET 
                    name='$name',
                    age='$age',
                    email='$email'
                    WHERE id=$id";

    if(mysqli_query($conn, $update_sql)){
        header("Location: students_list.php");
        exit();
    } else {
        echo "Error updating student: ".mysqli_error($conn);
    }
}
?>

<h2>Edit Student</h2>
<form action="" method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Age: <input type="number" name="age" value="<?php echo $row['age']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    <button type="submit" name="update">Update</button>
</form>

<?php mysqli_close($conn); ?>