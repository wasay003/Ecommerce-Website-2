<?php include("dbcon.php"); ?>
<?php  require('session_include.php'); ?>

<?php 
  
  $Email = $_SESSION['email_id'];
  $query1 = "select `id` from `users` where `Email` = '$Email'";

  $result1 = mysqli_query($connection, $query1);

  $row1 = mysqli_fetch_assoc($result1);

  $id_user = $row1['id'];
  
  $total_amount = $_SESSION['total'];
  $date = date("Y-m-d");
  $status = 'Pending';



foreach ($_SESSION['cart'] as $item) {
    $item_id =  $item['id'] . "<br>";
}


$query_for_quantity = "select * from `products` where `id` = '$item_id'";

$result_for_quantity = mysqli_query($connection, $query_for_quantity);

$row_for_quantity = mysqli_fetch_assoc($result_for_quantity);




if($row_for_quantity['product_Quantity'] > 0){


$query =  "insert into `orders` (`order_date`, `total_amount`, `order_status`, `user_id`, `is_guest`) values ('$date', '$total_amount', '$status', '$id_user', '1')";


$result = mysqli_query($connection, $query);



$query_order = "select * from `orders`";

$result_order = mysqli_query($connection, $query_order);

while ($row = mysqli_fetch_assoc($result_order)) {
$status = $row['order_status'];
$order_id = $row['order_id'];
}

foreach ($_SESSION['cart'] as $item) {


$item_id =  $item['id']; 
$item_name = $item['product_name']; 
$item_price = $item['product_price']; 
$item_quantity = $item['quantity']; 

$query_order_items = "insert into `order_items` (`order_id`, `product_id`, `quantity`, `price`) values ('$order_id', '$item_id', '$item_quantity', '$item_price')";

$result_order_items = mysqli_query($connection, $query_order_items);


}






$quantity = $row_for_quantity['product_Quantity'] - 1;
$query = "update `products` set `product_Quantity` = '$quantity' where `id` = '$item_id'";
$result = mysqli_query($connection, $query);
header("location:finalpage.php");    
}

else{
echo "<script>alert('Below item is currently out of stock: " . $row['product_name'] . "');
window.location.href = 'index.php';</script>";
}

?>



