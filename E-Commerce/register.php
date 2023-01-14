<?php
session_start();
if(!empty($_SESSION['email'])){
    header("location:dashboard1.php");
}
?>
<html>
    <h1>Register</h1>
    <form action="loginControl.php" method= "POST" id= "register">
    E-mail: <input type="email" name= "email" id= "email">
    Mobile Number: <input type="number" name= "number" id= "number">
    <input type="button" onclick= "test();" value= "login">
    </form>
    <script>
        function test(){
            var email= document.getElementById('email').value;
            var number= document.getElementById('number').value;
            if(email == ''){
                alert("enter email");
                return false;
            } else if(number == ''){
                alert("Enter Mobile Number");
                return false;
            }
            document.getElementById("register").submit();
        }
        
    </script>
</html>