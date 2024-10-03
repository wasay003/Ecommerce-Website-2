<?php include("dbcon.php") ?>
<!DOCTYPE html>
    <html lang="en">
        
        <?php include("header1.php");?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include("topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container"> 
    <div class="box1">
        <h1>Currently Listed Orders</h1>
    </div>
   <a href="admin_panel.php" button></button></a>
    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Ordered By</th>
                <th>Order Details</th>
                <th>Mark Order as Completed</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `orders`";

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
                            <?php 
                            $user_id = $row['user_id']; // Get user_id from the current order
                            
                            $user_query = "SELECT * FROM `users` WHERE `id` = '$user_id'";
                            $user_result = mysqli_query($connection, $user_query);
                
                            if ($user_result) {
                                $user_row = mysqli_fetch_assoc($user_result);
                                $fname = $user_row["Email"];
                                
                                echo $fname ; // Display full name
                            } else {
                                echo "User not found.";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="order_details.php?id=<?php echo $row['order_id']; ?>" class="btn btn-primary">Order Details</a>
                        </td>
                        <td>
                            <a href="order_mark_complete.php?id=<?php echo $row['order_id']; ?>" class="btn btn-success">Mark Completed</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>



        </tbody>
    </table>

            <!-- End of Main Content -->

           <?php include("footer1.php");?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <php include("scroll_to_top.php"); ?>

    <!-- Logout Modal-->
    <?php include("logout_admin.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <?php include("scripts_admin.php"); ?>

</body>

</html>

