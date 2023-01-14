    <h1 style= "text-align: center;">Company Login </h1>
    <title> Company Login</title>

<body style= "text-align: left;">
<div style= "text-align: center;color:red;"><?php if(!empty($_REQUEST['loginError'])){
    echo $_REQUEST['loginError'];
}?></div>
        <table class="centernew">
     <form method= "POST" action= "newlogin.php" id= "login">
    <tr>
        <td>
        Email :<input type="text" name="email" id= "email">
        </td>    
    </tr>
    <tr>
        <td>
        Password : <input type="password" name="password" id= "password">
        </td>
    </tr>
    <tr>
        <td>
        <input type = "button" onclick="checkLogin();" value="submit">
        </td>
    </tr>
    </form>
</table>    
</body>
<script>
     function checkLogin(){
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        if(email ==''){
            alert("Please enter email");
        }else if(password == ''){
            alert("please enter the password");
        }
        document.getElementById("login").submit();

     }
     </script>
    