<?php require('session_include.php'); ?>
<?php include("dbcon.php"); ?>
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
        <h1>Currently Listed Users</h1>
    </div>

    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Password</th>
                
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `users`";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><a href="Admin-User-Order-Process.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Order</a></td>
                       
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

