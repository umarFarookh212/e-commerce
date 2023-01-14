<?php
session_start();
if(empty($_SESSION['email'])){
    header("location:loginform.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_shopping";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM user where email = '".$_SESSION['email']."' ";
$result = mysqli_fetch_assoc($conn->query($sql));
?>
<style>
.center{
    background-color:#;
}
.centerNew{
    margin-left: auto;
    margin-right:auto;
}
</style>
<li>
<title>e-commerce</title>
<h1 style="text-align:center;">Myprofile Form</h1>

<body class = "center">
    <form method = "POST" action = "registrationController.php">
        <table class="centernew">
<tr>
            <td>
        Name: <input type= "text" name = "name" id = "name" value="<?php echo $result['name']?>">
</td>
</tr>
<tr>
        <td>   
        Email: <input type= "email" name = "email" id = "email" value="<?php echo $result['email']?>">
</td>   
</tr>
</tr>
<tr>
        <td>
        Password: <input type= "password" name = "password" id = "password">
</td>
</tr>
<tr>
        <td>
        Conform password: <input type= "password" name = "conformPassword" id = "conformPassword">
</tr>
</td>
<tr>
        <td>
        <input type = "button" onclick = "test();" value = "submit">
</td>
</tr>
</li>
</table>
</form>
</body>
<script>
function test(){
    name = document.getElementById("name").value;
    email = document.getElementById("email").value;
    company = document.getElementById("company").value;
    password = document.getElementById("password").value;
    conformPassword = document.getElementById("conformPassword").value;
    if(name == ''){
        alert ("enter name");
        return false;
    }else if(email == ''){
        alert ("enter email");
        return false;
    }else if(company == ''){
   alert ("enter company name");
   return false;
    }else if(password == ''){
    alert ("enter password");
    return false;
    }else if(conformPassword != password){
    alert ("Please check the password or confirmpossword should be same");
     return false;
    }

}
</script>
