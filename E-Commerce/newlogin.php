<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_shopping";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM users where email = '".$_POST['email']."'";
$result = $conn->query($sql);

$status = 'No data found!';
if ($result->num_rows > 0){
    $_SESSION['email'] = $_POST['email'];
    $status = 'success';
}
$conn->close();
if(trim($status) == "success"){
    header("location: dashboard.php");exit;
}
header("location: loginform.php?loginError=Invalid Login Details");

?>