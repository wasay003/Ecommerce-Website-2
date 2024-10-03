<?php require('session_include.php'); ?>
<?php include('header.php'); ?>
<div class="container">
    <h2>Registration</h2>
    <form action="register_user_process.php" method="post">
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="text" class="form-control" id="Password" name="Password" required>
        </div>
     
 <button type="submit" class="btn btn-primary" name="Register">Add New User</button>
    </form>
</div>
<?php
if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
    echo($error_message);
}
?>
<?php 
include('footer.php'); 
?>