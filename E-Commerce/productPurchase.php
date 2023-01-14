<?php
session_start();
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_Shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
$sql= "SELECT * FROM products_data WHERE id= '".$_REQUEST['id']."'";
$result= $conn->query($sql);
$test= mysqli_fetch_assoc($result);

$errMsg= "**Avalible Quantity is less than selected Quantity**";

    if($result->num_rows>0){

    $key = array_search($_REQUEST['id'], array_column($_SESSION['productData'], 'productid'));
    $qty = 0;

    if($key !== false && $key !== null){
        $dataCheck = $_SESSION['productData'][$key];
        $qty = $dataCheck['productqty'];
    }
    $quantity=  $qty + $_REQUEST['product_quantity'];
    
    if(!empty($test['avalible_quantity']) && $quantity > $test['avalible_quantity']){
        header("location:productDetails.php?id=".$_REQUEST['id']."&error=".$errMsg."");exit;
    }
    if($key !== false  && $key !== null){
        $_SESSION['productData'][$key] =['productid'=>$_REQUEST['id'], 'productqty'=>$quantity];
    } else {
        $_SESSION['productData'][] =['productid'=>$_REQUEST['id'], 'productqty'=>$_REQUEST['product_quantity']];
    }
        header("location:cart.php");exit;
    }
    


    /*  $avalible_quantity = $test['avalible_quantity'] - $quantity;
        $sqlUpdate = "UPDATE products_data SET avalible_quantity=".$avalible_quantity." WHERE id=".$_REQUEST['id']."";
        $conn->query($sqlUpdate);
        $conn->close(); */