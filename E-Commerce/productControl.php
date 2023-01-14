<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_shopping";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql= "SELECT * FROM products_data where product_title = '".$_POST['product_title']."'";
$sqlUpadate = "SELECT * From products_data where id= '".$_REQUEST['id']."' ";
$result = $conn->query($sql);
$status = "False";
$target_file= "uploads/";
$erroMsg = '';
if($result->num_rows <=0){

    $file_tmp = $_FILES['product_image']['tmp_name'];
    $file_name = $_FILES['product_image']['name'];

    move_uploaded_file($file_tmp,$target_file.$file_name);
    $sql = "INSERT INTO products_data (product_title, product_image, product_price, product_quantity) 
    VALUES('".$_POST['product_title']."','".$file_name."','".$_POST['product_price']."','".$_POST['product_quantity']."')";
     
$conn->query($sql);
$conn->close();
$status= 'success';
$erroMsg = 'Product Submitted successfully';
} elseif($result->num_rows>0){
    $file_name = $_REQUEST['oldImageName'];
    if(!empty($_FILES['product_image']['name'])){
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_name = $_FILES['product_image']['name'];
        move_uploaded_file($file_tmp,$target_file.$file_name);
        }
        $sqlUpdate = "UPDATE products_data SET product_title='".$_REQUEST['product_title']."',product_image= '".$file_name."',
        product_price='".$_REQUEST['product_price']."', product_quantity=".$_REQUEST['product_quantity']." WHERE id=".$_REQUEST['id']."";

    $conn->query($sqlUpdate);
    $conn->close();
    $status= "success";
    $erroMsg = 'Product Data Updated successfully';
}
if($status =='success'){
    header("location: productList.php?msg=$erroMsg");exit;
}
header('location: productAddData.php');
?>

