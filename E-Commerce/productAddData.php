<html>
<style>
.centerNew{
        margin-left:center;
        margin-right:center;
    }
</style>
<h1 text-align= "center">Product Adding</h1>
    <body>
        <form method= "POST" action= "productControl.php" id= "submission" enctype= "multipart/form-data">
                <table class= "centerNew">
                    <tr>
                        <td>
                        Product Title:<input type="text" name= "product_title" id= "product_title" placeholder= "Product Name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Image: <input type="file" name= "product_image" id= "product_image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Product Price: <input type="int" name= "product_price" id= "product_price" placeholder= "Product Price">

                        </td>
                    </tr>
                    <tr>
                        <td>
                        Product Quantity: <input type="number" name= "product_quantity" id= "product_quantity" placeholder= "No.of Products">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="button" onclick= "upload();" value= "Submit">
                        </td>
                    </tr>

                </table>
        </form>
    </body>
<script>
function upload(){
    var title= document.getElementById("product_title").value;
    var image= document.getElementById("product_image").value;
    var price= document.getElementById("product_price").value;
    var quantity= document.getElementById("product_quantity").value;
    
    if(product_title == '')
        {
            alert("Enter Product Name");
            return false;
        }else if(product_image =='')
        {
            alert("Enter Image");
            return false;
        }else if(product_price == '')
        {
            alert("Enter Product Price");
            return false;
        }else if(product_quantity =='')
        {
            alert("Enter qunatity");
            return false;
        }
        document.getElementById("submission").submit();
}
</script>
    

</html>