<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
$sql= "SELECT * FROM products_data WHERE id= '".$_REQUEST['id']."'";
$result = mysqli_fetch_assoc($conn->query($sql));
$status= "success";
?>
<div class= "errorMsg">
<?php
if(!empty($_REQUEST['error'])){
    echo $_REQUEST['error'];
}
?>
</div>
<style>
    .errorMsg{
        text-align: center;
        color: red;
    }
</style>

<form action="productPurchase.php?id=<?php echo $_REQUEST['id'];?>" method= "POST" enctype= "multipart/form-data" id= "product_details">
        <table>
            <tr>
                <td>
                product Title: <?php echo $result['product_title'] ?>
                </td>
            </tr>     
            <tr>
                <td>
                product Image:
                <?php if(!empty('product_image') && 'product_image' !== null){
                    ?>
                <img src='uploads/<?php echo $result['product_image'];?>' height='175px' width='175px'>
                <?php } else{
                    echo "file Not found!"; }?>
                </td>
             </tr>
            <tr>
                <td>
                    product Price: <?php echo $result['product_price']?>
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                product quantity: <input type="number" name= "product_quantity" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" onclick= "test();" value= "View Cart">
                </td>
            </tr>
            </table>
    </form>
