<?php
session_start();
if(empty($_SESSION["productData"])){
    header("location:productCardList.php");exit;
}
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn = new mysqli($servername, $username, $password, $dbname);


$order_number = 'order-'.time() . mt_rand() ;
$sql = "INSERT INTO `order` (order_number, name, email, billing_address, billing_mobile, billing_state, billing_city, billing_pincode, status) 
VALUES('".$order_number."', '".$_POST['name']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['number']."',
            '".$_POST['state']."', '".$_POST['city']."', '".$_POST['pincode']."', '1')";
$conn->query($sql);
$insertId = $conn->insert_id;

foreach($_SESSION["productData"] as $order){
    $sql= "SELECT * From products_data WHERE id= ".$order['productid']."";
    $result= $conn->query($sql);
    $rows= mysqli_fetch_assoc($result);
    $price = (int) $order['productqty'] * $rows['product_price'];
        
   $sql = "INSERT INTO `order_details` (order_id, product_id, product_name product_quantity, product_price, status) 
 VALUES(".$insertId.",'".$order['productid']."', '".$rows['product_title']."', '".$order['productqty']."', '".$price."', '1')";
$conn->query($sql);
}

$conn->close();
unset($_SESSION["productData"]);

header("location:thankYou.php?orderNumber='".$order_number."'&id=$insertId");exit;
?>