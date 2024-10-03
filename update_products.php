<?php require('session_include.php'); ?>
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
     if(isset($_GET['id'])){
        $id =  $_GET['id'];
     
        $query = "select * from `products` where `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query failed".mysqli_error());
        }
        else{
           
            $row = mysqli_fetch_assoc($result);

           
        }                 
     
    }

?>


      <?php


                if(isset($_POST['update_products'])){


                    if(isset($_GET['id_new'])){
                        $idnew = $_GET['id_new'];
                    }


                    $pname = $_POST['product_name'];
                    $pprice = $_POST['product_price'];
                    $pcategory = $_POST['product_category'];
                    $pdescription = $_POST['product_description'];
                    $pquantity = $_POST['product_Quantity'];

                    $filename = $_FILES["uploadfile"]["name"];
                    $tempname = $_FILES["uploadfile"]["tmp_name"];
                    $folder = "Images/".$filename;
                    move_uploaded_file($tempname, $folder);    
                    
 
                    if($folder == "Images/"){
                        $query = "update `products` set `product_name` = '$pname', `product_price` = '$pprice', `product_category` = '$pcategory', `product_description` = '$pdescription', `product_Quantity` = '$pquantity' where `id`= '$idnew'";
                    }
                    else{
                        $query = "update `products` set `product_image` = '$folder', `product_name` = '$pname', `product_price` = '$pprice', `product_category` = '$pcategory', `product_description` = '$pdescription', `product_Quantity` = '$pquantity'  where `id`= '$idnew'";
                    }
                    

                    $result = mysqli_query($connection, $query);

                    if(!$result){
                        die("query failed".mysqli_error());
                    }
                    else{
                        header('location:View-Edit-Products.php');
                    }
                }



?>
<div class="container">
    <h2>Update Student</h2>
<form action="update_products.php?id_new=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="product_name" value="<?php echo ($row['product_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="productPrice" name="product_price"value="<?php echo ($row['product_price']); ?>">
        </div>
        <div class="mb-3">
            <label for="product_category" class="form-label">Product Category</label>
            <input type="text" class="form-control" id="productCategory" name="product_category" value="<?php echo ($row['product_category']); ?>">
        </div>
        <div class="mb-3">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" class="form-control" id="productDescription" name="product_description" value="<?php echo ($row['product_description']); ?>">
        </div>
        <div class="mb-3">
            <label for="product_Quantity" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" id="productQuantity" name="product_Quantity" value="<?php echo ($row['product_Quantity']); ?>">
        </div>
        <div class="product_img_update">

            <div class="mb-3">
                <label for="product_image" class="form-label">Product image</label>
                <img src="<?php echo ($row['product_image']); ?>" alt="">
                <input type="file" class="form-control"  name="uploadfile" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="update_products">Update Product</button>
    </div>
    </form>



<?php include('footer.php'); ?>