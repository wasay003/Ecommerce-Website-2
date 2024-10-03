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
                <?php include("pagecontent.php"); ?>
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

