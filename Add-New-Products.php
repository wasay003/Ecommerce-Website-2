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
                 <div class="product">
          
                <form action="New-Products-Process.php" method="post" class="vh-100 gradient-custom" enctype="multipart/form-data">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white blue-background" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Add New Products</h2>
              <p class="text-white-50 mb-5">Please add your product details</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name"  class="form-control form-control-lg" />
              </div>
              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Price</label>
                <input type="number" min=0 name="product_price"  class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Category</label>
                <input type="text" name="product_category"  class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Quantity</label>
                <input type="number" name="product_Quantity"  class="form-control form-control-lg" />
              </div>

              <div class="product_img_update">
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <label class="form-label">Product Image</label>
                  <input type="file" name="uploadfile" class="form-control form-control-lg" required/>
                </div>

              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Description</label>
                <textarea class="form-control" name="product_description" id="exampleTextarea" rows="4" placeholder="Enter your message here..."></textarea>
              </div>

              


              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="add_products_btn">Add Product</button>
              
              
              
            </div>
            </div>
            <?php
if (isset($_GET['incorrect'])) {
    $errorMessage = $_GET['incorrect'];
    echo "<p style='color:white; text-align:center; width:100%; font-size: 26px'>" . $errorMessage . "</p>";
}
?>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</form>
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

