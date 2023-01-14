<?php
session_start();
?>
<div style="text-aligin:right;">
(Cart)<?php echo count($_SESSION["productData"]);?>
</div>

<?php
$servername="localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
?>
<style>
    .card {
  box-shadow: 10px 20px 20px 20px rgba(0, 0, 0, 0.2);
  max-width: 250px;
  margin-left: 500px;
  margin-top: 50px;
  text-align: center;
  height: 400px;
  border-radius: 10px;
}

.btn-addToCard{
  width: 200px;
  height:50px;
  background-color: rgba(178, 30, 215, 0.699);
  border:none;
  color: white ;
  font-size: 25px;
  border-radius: 10px;
  margin-top: 50px;

  margin-left: 50px;
}
.card button:hover {
  opacity: 0.7;
}
</style>

<?php
  foreach($_SESSION["productData"] as $value){
    $sql= "SELECT * FROM products_data WHERE id= '".$value['productid']."'";
    $result= $conn->query($sql);
    $rows= mysqli_fetch_assoc($result);
?>
<div class="card" id="product_data_<?php echo $rows['id']; ?>">

  <img src="uploads/<?php echo $rows['product_image'];?>" style="width:100%;height:100px;">

  <p><?php echo $rows['product_title'];?></p>

  RS:<?php echo $rows['product_price'];?>/-<br>

  Quantity:<input type="text" name="qty[]" value="<?php echo $value['productqty'];?>" id="productqty_<?php echo $rows['id']; ?>"/>

  <p>Total Price:<span id="product_qty_<?php echo $rows['id']; ?>"><?php echo $rows['product_price'] * $value['productqty']; ?></span></p>

    <input type="hidden" id="product_price_<?php echo $rows['id']; ?>" value="<?php echo $rows['product_price'];?>">
  <div>
<button>
<a href="javascript:void(0);" onClick="updateCart('<?php echo $value['productid']; ?>', 'false');";>Update</a>
</button>
(or)
<button>
<a href="javascript:void(0);" onClick="updateCart('<?php echo $value['productid']; ?>', 'true');";>Remove</a>
</button>
<button>
<a href="orderDetails.php?id= <?php echo $rows['id'];?>">Order Item</a>
</button>

  </div>
</div>
<?php } ?>
<script>

    function updateCart(productId, removeStatus){
      
        var qty = document.getElementById('productqty_'+ productId).value;
        var xhttp = new XMLHttpRequest();

      xhttp.open("POST", "buyNow.php", true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.removeStatus = removeStatus;
      xhttp.onreadystatechange = function(){
        
        var remove_Status;
        remove_Status = this.removeStatus;
        if(remove_Status == 'true'){
          document.getElementById('product_data_'+ productId).remove();
        }
        else if(this.readyState == 4 && this.status == 200) {
          document.getElementById('product_qty_'+ productId).innerHTML = document.getElementById('productqty_'+ productId).value * document.getElementById('product_price_'+ productId).value;
        }
        
      };

      var data = {productId:productId,qty: qty, removeStatus:removeStatus};
      xhttp.send(JSON.stringify(data));
      }


</script>