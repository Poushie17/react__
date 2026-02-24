<?php
$conn=mysqli_connect("localhost","root","","school");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $subjects=$_POST['subjects'];
    $address=$_POST['address'];

    $sql="update teachers set
    name='$name',
     age='$age',
        email='$email',
        phone='$phone',
        gender='$gender',
        department='$department',
        subjects='$subjects',
        address='$address'
        WHERE id=$id";
        if(mysqli_query($conn,$sql)){
    echo "Teacher profile updated successfully! <a href='form.php'>Go Back</a>";
} else {
    echo "Error updating record: ".mysqli_error($conn);
}

mysqli_close($conn);
}

