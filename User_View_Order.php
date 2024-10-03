<?php include("dbcon.php"); ?>
<?php include("header.php"); ?>
<?php include("session_include.php");?>
<?php 
   if(isset($_GET['id'])){
  
    $id = $_GET['id'];


   ?>

<div class="container"> 
    <div class="box1">
        <h1>Your Current Orders<?php echo $_SESSION['Email'];?></h1>
    </div>

    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Order Details</th>
              
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `orders` where `user_id` = '$id'";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['order_status']; ?></td>
                        <td>
                            
                                <a href="order_details.php?id=<?php echo $row['order_id']; ?>" class="btn btn-primary">Order Details</a>
                            </td>
                            </tr>
                            <?php 
                            
                        
                    
            }
        }
            ?>



        </tbody>
    </table>

    <?php
}
    else{
        echo "<h1> Invalid User ID </h1>";
    }
   

?>
<?php include("footer.php"); ?>