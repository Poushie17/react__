<?php

$conn=mysqli_connect("localhost","root","","school");
$sql="select * from teachers";
$result=mysqli_query($conn,$sql);
echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td><a href='edit.php?id=" .$row['id']. "'>Edit</a>
            </tr>
            ";
}

echo "</table>"

?>