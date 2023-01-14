<?php
session_start();
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "userlogin";
$conn= new mysqli($servername, $username, $password, $dbname);
$sql= "SELECT * FROM logins where email= '".$_POST['email']."'";
$result= $conn->query($sql);
$status = false;
if($result-> num_rows<=0){
    $_SESSION['email'] = $_POST['email'];
        $sql= "INSERT INTO logins (email, number)
        values('".$_POST['email']."', '".$_POST['number']."')";
$conn->query($sql);
$status = 'success';
}
$conn->close();
if($status == 'success'){
    header("location: dashboard1.php");
}
?>