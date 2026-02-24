<?php
    $conn=mysqli_connect("localhost","root","","product");

    if(!$conn){
        die(mysqli_connect_error($conn));

    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
       // $id=$_POST["id"];
        $name=$_POST["name"];
        $price=$_POST["price"];
        $category=$_POST["category"];
        $condition=isset($_POST["conditon"])?$_POST["condition"]:"";
        $expire=$_POST["expiry"];
         $brand=$_POST["brand"];
       
       }
    $sql="insert into product_info (name, price, category, `condition`, expiry, brand) values ('$name','$price','$category','$condition', '$expire', '$brand')  ";
    if(mysqli_query($conn,$sql)){
        echo "prodcut added ","<br>";
    }
    else{
        echo mysqli_error($conn);
    }

    $result=mysqli_query($conn,"select * from product_info");
    if(mysqli_num_rows($result)>0){
        echo "<table>
        <tr> 
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
               
                <th>Condition</th>
                <th>exipry</th>
                <th>Brand</th>
        
        </tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>

                <td> {$row['name']} </td>
                <td> {$row['category']} </td>
                 <td>{$row['price']}</td>
    
                <td>{$row['condition']}</td>
                <td>{$row['expiry']}</td>
                <td>{$row['brand']}</td>
            
            
            
            </tr>";
        }
            echo "</table>";
            }
    else{
        echo "no porduct";
    }
       mysqli_close($conn);
?>