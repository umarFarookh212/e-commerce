<?php
session_start();
if(!empty($_SESSION['email'])){
    echo "Welcome to dashboard";
}else if(empty($_SESSION['email'])){
    header("location:loginform.php");
}

?>
<div style="text-align:right;">
<ul>
<li>
<a href="./logout.php">LogOut</a>
</li>
</ul>
</div>