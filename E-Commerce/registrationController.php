<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_shopping";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM users where email= '".$_POST['email']."' ";
$result = $conn->query($sql);
$status = false;
if($result->num_rows<=0){
    $_SESSION['email'] = $_POST['email'];
    $sql = "INSERT INTO users (name, email, password, status)
    VALUES('".$_POST['name']."' ,'".$_POST['email']."', '".md5($_POST['password'])."', 1)";
$conn->query($sql);
$status = 'success';
}
$conn->close();
if($status == 'success')
{
    header("location: dashboard.php");
}
header("location: registration.php?emailError=email-ID already Exists Login For DashBoard");

?>
