<?php
$conn=mysqli_connect("localhost","root","","school");
$id=$_GET['id'];

$sql="select * from teachers where id=$id ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<h1>teahers details:</h1>
<form action="update.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
Name: <input type="text" name="name" value="<?php echo $row['name'] ?>"><br><br>
Age: <input type="number" name="age" value="<?php echo $row['age']; ?>"><br><br>
Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
Phone: <input type="number" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
Gender: <input type="radio" name="gender" value="Male"<?php  if($row['gender']=="Male")echo "checked"; ?>>Male
        <input type="radio" name="gender" value="Female" <?php if($row['gender']=="Female")echo "checked"; ?>>Female<br><br>
Department: <select name="department" id="">
 <option  value="CSE"<?php  if($row['department']=="CSE")echo "selected"; ?>>CSE
<option  value="ESE"<?php  if($row['department']=="ESE")echo "selected"; ?>>ESE
<option  value="EEE"<?php  if($row['department']=="EEE")echo "selected"; ?>>EEE
<option  value="BBA"<?php  if($row['department']=="BBA")echo "selected"; ?>>BBA </select><br><br>
Subjects :
<input type="text" name="subjects" value="<?php echo $row['subjects'] ?>"><br><br>
Address: <textarea name="address"><?php echo $row['address']; ?></textarea><br><br>

<button type="submit">Update</button>
   
       </select>


</form>
</table>