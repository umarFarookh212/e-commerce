<?php
session_start();
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn= new mysqli($servername,$username,$password,$dbname);

$json = file_get_contents('php://input');
$decode= (array) json_decode($json);

$productid = $decode['productId'];
$qty =  $decode['qty'];
$remove= $decode['removeStatus'];

$key = array_search($productid, array_column($_SESSION['productData'], 'productid'));

if($remove == 'false'){
    $sql= "SELECT * FROM products_data WHERE id= '".$productid."' ";
    $result= $conn->query($sql);
    $test= mysqli_fetch_assoc($result);


    if(!empty($test['avalible_quantity']) && $qty>$test['avalible_quantity']){
        header("location:card.php);?id=".$productid."&error=".$errMsg."");exit;
    }
    $_SESSION['productData'][$key] =['productid'=>$productid, 'productqty'=>$qty];
}
else{
    unset($_SESSION['productData'][$key]);
}
?>

