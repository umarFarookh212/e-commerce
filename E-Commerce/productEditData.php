<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "online_shopping";
$conn= new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM products_data where id = '".$_REQUEST['id']."' ";
$result = mysqli_fetch_assoc($conn->query($sql));
?>
    <h1 style= "text-align: center">Product Admin Edit</h1>
    <body>
        <form id= "productEdit" method= "POST" action= "productControl.php?id=<?php echo $_REQUEST['id'];?>" enctype= "multipart/form-data">
    <table>
        <tr>
            <td>
            Product Title: <input type="text" name= "product_title" id= "product_title" value= "<?php echo $result['product_title'] ?>">
            </td>
        </tr>
        <tr>
            <td>
            Product Image: 
            <?php if(!empty('product_image') && 'product_image' !== null){
             ?>
             <img src='uploads/<?php echo $result['product_image'];?>' hight='195px' width='195px'>
             <?php } ?>
             <input type="hidden" name="oldImageName" value="<?php echo $result['product_image'];?>">
             <input type="file" name= "product_image" id= "product_image" value= "<?php echo $result['product_image']?>">
            </td>
        </tr>
        <tr>
            <td>
            Product Price: <input type="number" name= "product_price" id= "product_price" value= "<?php echo $result['product_price']?>">
            </td>
        </tr>
        <tr>
            <td>
            Product Quantity: <input type="number" name= "product_quantity" id= "quantity" value= "<?php echo $result['product_quantity']?>">
            </td>
        </tr>
        <tr>
            <td>
            <input type="button" onclick= "submit();" value= "Update">   
            </td>
        </tr>
        </table>
        </form>
        <script>
            function submit(){
            var product_title= document.getElementById('product_title').value;
            var product_image= document.getElementById('product_image').value;
            var product_price= document.getElementById('product_price').value;
            var product_quantity= document.getElementById('product_quantity').value;
            }
        </script>
    </body>