<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_shopping";

$json = file_get_contents('php://input');
$encode = (array) json_decode($json);

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM company where email = '".$encode['email']."'";
$result = $conn->query($sql);
$status = 'No data found!';
if ($result->num_rows > 0 ){
    $sql = "UPDATE company SET email='".$encode['email']."', name='".$encode['name']."',

    company='".$encode['company']."', password= '".md5($encode['password'])."'

     where email='".$_SESSION['email']."'";
     
    $result = $conn->query($sql);
    $_SESSION['email'] = $encode['email'];
    $_SESSION['name'] = $encode['name'];
    $_SESSION['company']= $encode['company'];
    $_SESSION['password']= $encode['password'];
    $status = 'success';
}
$conn->close();
echo $status;
?>