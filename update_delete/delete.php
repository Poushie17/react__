<?php
$conn = mysqli_connect("localhost","root","","school");
if(!$conn){ die("Connection failed: ".mysqli_connect_error()); }

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        header("Location: form.php");
        exit();
    } else {
        echo "Error deleting student: ".mysqli_error($conn);
    }
} else {
    echo "No student ID provided.";
}

mysqli_close($conn);
?>