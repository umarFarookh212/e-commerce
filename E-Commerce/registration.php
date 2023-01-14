<?php
session_start();
if(!empty($_SESSION['email'])){
    header("location:dashboard.php");
}
?>
<div style= "text-align: right">
        <a href= "./loginform.php/">Login</a> 
</div>
<style>
.center{
    background-color:lightblue;
}
.centerNew{
    margin-left: auto;
    margin-right:auto;
}
</style>
<title>e-commerce</title>
<h1 style="text-align:center; ">New Employee Registration:</h1>
<h4 style = "text-align:center;">Registration Form:</h4>

<body class = "center">
    <div class="container">
        <div style= "text-align: center;color:red;"><?php if(!empty($_REQUEST['emailError'])){
            echo $_REQUEST['emailError'];
        }?></div>
    <form method = "POST" action = "registrationController.php" id= "register">
        <table class="centernew">
<tr>
            <td>
        Name: <input type= "text" name = "name" id = "name">
</td>
</tr>
<tr>
        <td>   
        Email: <input type= "email" name = "email" id = "email">
</td>   
</tr>
<tr>
        <td>
        Password: <input type= "password" name = "password" id = "password">
</td>
</tr>
<tr>
        <td>
        Confirm password: <input type= "password" name = "conformPassword" id = "conformPassword">
</tr>
</td>
<tr>
        <td>
        <input type = "button" onclick = "checkValidation();" value = "submit">
</td>
</tr>
</table>
</form>
</div>
</body>
<script>
function checkValidation(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var conformPassword = document.getElementById("conformPassword").value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(name == ''){
        alert ("Enter name");
        return false;
    }else if(email == ''){
        alert ("Enter email");
        return false;
    }else if(!email.match(mailformat)){
        alert("Invalid Email id");
        return false;
    }else if(password == ''){
    alert ("Enter password");
    return false;
    }else if(conformPassword != password){
    alert ("Please check the password or confirm Password should be same");
     return false;
    }
    document.getElementById("register").submit();
}
</script>

