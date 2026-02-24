<?php
$conn=mysqli_connect("localhost","root","","studentdb");
if(!$conn){
    die(mysqli_connect_error($conn));
}

$sql="select * from student";

$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0){
    echo "
    <table>
    <tr>
    <th>Name: </th>
    <th>Age: </th>
    <th>Department: </th>
    <th>Hobbies: </th>
    </tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo"
        <tr>
        <td>".$row["name"]."</td>
        <td>".$row["Age"]."</td>
        <td>".$row["department"]."</td>
        <td>".$row["Hobbies"]."</td>
        


</tr>";
    }
    echo "</table>";


}

else{
    echo "no result";
}

mysqli_close($conn)
?>