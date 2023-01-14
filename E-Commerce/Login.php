<h1>Login Page</h1>
<form method= "POST" action= "login1.php" id= "login">
    Email :<input type="text" name="email" id= "email">
    Mobile Number : <input type="number" name="number" id= "number">
    <input type = "button" onclick="checkLogin();" value="submit">
</body>
<script>
     function checkLogin(){
        var email = document.getElementById("email").value;
        var number = document.getElementById("number").value;
        if(email ==''){
            alert("Please enter email");
        }else if(number == ''){
            alert("please enter the Mobile Number");
        }
        document.getElementById("login").submit();

     }
     </script>
    