<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=trim($_POST["name"]);
    $age=trim($_POST["age"]);
    $email = trim($_POST["email"]);
    $dob=trim($_POST["dob"]);
    $department=trim($_POST["department"]);
    $gender=isset($_POST["gender"])?$_POST["gender"]:"";
    $skill=isset($_POST["skill"])?$_POST["skill"]:[];
    $address=trim($_POST["address"]);

    $error=[];

    if(empty($name)){
        $error[]="name is required";
    }
    if(empty($age) || !is_numeric($age) || $age<=0){
        $error[]="invalid age";
    }
    if(empty($email)|| !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error[]="name is required";
    }

    if (empty($gender)) {
        $errors[] = "Gender required";
    }

    if (empty($department)) {
        $errors[] = "Department required";
    }

    if (empty($dob)) {
        $errors[] = "Date of birth required";
    }

    if (empty($address)) {
        $errors[] = "Address required";
    }

    if (empty($skills)) {
        $errors[] = "At least one skill required";
    }

    if(!empty($error)){
        echo"<h3>Error:</h3>";
        foreach ($error as $e){
            echo $e."<br>";
        } 
    }

    echo "Name: ". htmlspecialchars($name)."<br>";
     echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Age: " . htmlspecialchars($age) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Department: " . htmlspecialchars($department) . "<br>";
    echo "Date of Birth: " . htmlspecialchars($dob) . "<br>";
    echo "Address: " . htmlspecialchars($address) . "<br>";
    echo "Skills: " . htmlspecialchars(implode(", ", $skill)) . "<br>";
} else {
    echo "Invalid access";
}







?>