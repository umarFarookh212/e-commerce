<?php
$servername="localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
$test= "SELECT * FROM products_data";
$result = $conn->query($test);
?>
<style>
    .card {
  box-shadow: 10px 20px 10px 10px rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin-left: 400px;
  margin-top: 50px;
  text-align: center;
  height: 500px;
  font-family: arial;
  border-radius: 20px;
}
.newCard{
  text-align: center;
  margin-left: 400px;
}
p{
  color: black;
  font-size: 22px;
}
.btn-addToCard{
  width: 200px;
  height:40px;
  background-color: rgba(178, 30, 215, 0.699);
  border:none;
  color: white ;
  font-size: 25px;
  border-radius: 06px;
  margin-top: 50px;
  margin-left: 50px;
}
</style>
  <?php
      while($rows= mysqli_fetch_assoc($result)){
          echo "Model: ".$rows['product_title']. "<br>";
          echo $rows['product_image']. "<br>";
          echo "Rs.".$rows['product_price'];
  ?>
<div class="card">
<img src="uploads/<?php echo $rows['product_image'];?>"style="width:100%">
<p><?php echo $rows['product_price']; ?></p>

  <div class= btn-addToCard>
    <a href="productDetails.php?id=<?php echo $rows['id'];?>">Details</a>
  </div>
</div>
<?php } ?>