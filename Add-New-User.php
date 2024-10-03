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
    <h2>Add New User</h2>
    <form action="Add-New-User-Process.php" method="post">
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="text" class="form-control" id="Password" name="Password" required>
        </div>
     

        <button type="submit" class="btn btn-primary" name="Add-New-User">Add New User</button>
    </form>
</div>
<?php
if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
    echo($error_message);
}
?>

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

