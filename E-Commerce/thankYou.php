<?php
session_start();
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_Shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
$sql= "SELECT * FROM order_details WHERE id='".$_REQUEST['id']."'";
$result= $conn->query($sql);
$rows= mysqli_fetch_assoc($result);
?>
<h3>ThankYou Your Product <?php echo $rows['product_name']; ?>has been Placed & Product Id:<?php echo $rows['id'];?></h3>

<button>
<a href="productCardList.php">Home</a>
</button>

