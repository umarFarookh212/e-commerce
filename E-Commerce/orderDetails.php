<?php
session_start();
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
?>
<table>
<tr>
    <td>
        Product Title
    </td>
    <td>
        Product Qty
    </td>
    <td>
        Product Price
    </td>
</tr>
<h2>Order Details</h2>
<?php
$sum = 0;
foreach($_SESSION["productData"] as $order){
    $sql= "SELECT * From products_data WHERE id= ".$order['productid']."";
    $result= $conn->query($sql);
    $rows= mysqli_fetch_assoc($result);
    $price = (int) $order['productqty'] * $rows['product_price'];
    $sum += $price;
?>
<tr>
    <td>
    <p><?php echo $rows['product_title'];?></p>
    </td>
    <td>
    <p><?php echo $order['productqty'];?></p>
    </td>
    <td>
    <?php echo $price;?>
    </td>
</tr>
<?php
}
?>
<tr>
    <td></td>
    <td>Total Price</td>
    <td><?php echo $sum;?></td>
</tr>

</table>
<h2>**Billing Address**</h2>
<form action="order.php" method= "POST" >
    <table>
        <tr>
            <td>
                Full Name:<input type="text" name= "name" id= "name" required>
            </td>
        </tr>
        <tr>
            <td>
               Email:<input type="email" name= "email" id= "email" required>
            </td>
        </tr>
        <tr>
            <td>
                Mobile number: <input type="number" name= "number" id= "number" required>
            </td>
        </tr>
        <tr>
            <td>
                Full Address:<input type="text" name= "address" id= "address" required>
            </td>
        </tr>
        <tr>
            <td>
                State: <input type="text" name= "state" id= "state" required>
            </td>
        </tr>
        <tr>
            <td>
                Country: <?php echo "India"; ?>
            </td>
        </tr>
        <tr>
            <td>
                City: <input type="text" name= "city" id= "city" required>
            </td>
        </tr>
        <tr>
            <td>
                Pincode: <input type="number" name= "pincode" id= "pincode" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" onClick= "test();" value= "submit">
            </td>
        </tr>
    </table>
</form>
<script>
    function test(){
        var name= document.getElementById('name').value;
        var email= document.getElementById('email').value;
        var number= document.getElementById('number').value;
        var address= document.getElementById('address').value;
        var state= document.getElementById('state').value;
        var city= document.getElementById('city').value;
        var pincode= document.getElementById('pincode').value;
    
    if(name.trim()== ''){
        alert("Enter Name");
        return false;
    }else if(email == ''){
        alert("Enter Email");
        return false;
    }else if(number== ''){
        alert("enter Mobile Number");
        return false;
    }else if(address== ''){
        alert("Please Enter Billing Address");
        return false;
    }else if(state== ''){
        alert("Please Enter State ");
        return false;
    }else if(city== ''){
        alert("Please Enter City Name");
        return false;
    }else if(pincode== ''){
        alert("Please Enter Pincode");
        return false;
    }
}
<a href="thankYou.php?id= <?php echo $rows['id'];?>">Submit</a>


</script>
