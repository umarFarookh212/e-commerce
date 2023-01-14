<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
$list= "SELECT * From products_data";
$result= $conn->query($list);
?>
<table class= "table">
<tr>
    <th id= "product_title" >Product Title</th>
    <th id= "product_Image">Product Image</th>
    <th id= "product_quantity">Product Quantity</th>
    <th id= "product_price">Product Price</th>
    <th id= "action">Action</th>

</tr>
<?php
while($rows= mysqli_fetch_assoc($result)){
    
    echo "<tr>";
       echo "<td>".$rows['product_title']."</td>";
       echo "<td><img src='uploads/".$rows['product_image']."' height='200px' width='200px'></td>";
       echo "<td>".$rows['product_quantity']."</td>";
       echo "<td>".$rows['product_price']."</td>";
       echo "<td><a href='productEditData.php?id=".$rows['id']."'>Edit</a></td>";
    echo "</tr>";
}
?>
</table>
