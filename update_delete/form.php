<?php
$conn = mysqli_connect("localhost","root","","school");
$result = mysqli_query($conn, "SELECT * FROM students");

if(mysqli_num_rows($result) > 0){
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No students found.";
}
mysqli_close($conn);
?>