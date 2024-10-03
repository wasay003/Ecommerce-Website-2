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
        <h1>Currently Listed Products</h1>
    </div>

    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Category</th>
                <th>Product Description</th>
                <th>Product Quantity</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `products`";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td class="product_img"><img src="<?php echo $row['product_image']; ?>" alt=""></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_category']; ?></td>
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_Quantity']; ?></td>
                        <td><a href="update_products.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                        <td><a href="delete_products.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
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

