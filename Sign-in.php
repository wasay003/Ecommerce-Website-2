<?php include ("header.php"); ?>

<form action="sign-process.php" method="post" class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="email" name="Email"  id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" name="password"  id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              

              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="Sign-In">Login</button>

              <a href="register_user.php"button name="Register" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name>Register</button></a>

              <a href="Admin_Sign_In.php"button name="Admin" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name>Admin-SignIn</button></a>

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



<?php include ("footer.php"); ?>