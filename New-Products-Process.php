<?php include('dbcon.php'); ?>


<?php


if (isset($_POST['add_products_btn'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category = $_POST['product_category'];
    $description = $_POST['product_description'];
    $quantity = $_POST['product_Quantity'];


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "Images/".$filename;
    move_uploaded_file($tempname, $folder);             

    echo $name;
    echo "<br>";
    echo $price;
    echo "<br>";
    echo $category;
    echo "<br>";
    echo $description;
    echo "<br>";
    echo $quantity;
    
}



$query = "insert into `products` (`product_name`, `product_price`, `product_category`, `product_image`,`product_description`,`product_Quantity`) values ('$name', '$price', '$category', '$folder', '$description', '$quantity')";

$result = mysqli_query($connection, $query);

?>