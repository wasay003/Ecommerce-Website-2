<?php require('session_include.php'); ?>
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
     if(isset($_GET['id'])){
        $id =  $_GET['id'];
     
        $query = "select * from `users` where `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query failed".mysqli_error());
        }
        else{
           
            $row = mysqli_fetch_assoc($result);

           
        }                 
     
    }

?>


      <?php


                if(isset($_POST['update_user'])){


                    if(isset($_GET['id_new'])){
                        $idnew = $_GET['id_new'];
                    }


                    $uEmail = $_POST['Email'];
                    $upassword = $_POST['password'];
                    $uAdmin = $_POST['Admin'];
                    
                    $query = "update `users` set `Email` = '$uEmail', `password` = '$upassword', `Admin` = '$uAdmin'   where `id` ='$idnew'";


                    $result = mysqli_query($connection, $query);

                    if(!$result){
                        die("query failed".mysqli_error());
                    }
                    else{
                        header('location:View-Edit-User.php');
                    }
                }



?>
<div class="container">
    <h2>Update User</h2>
<form action="update_user.php?id_new=<?php echo $id; ?>" method="post">
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" class="form-control" id="Email" name="Email" value="<?php echo ($row['Email']); ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password"value="<?php echo ($row['password']); ?>">
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="Admin" value="1" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault"> Admin </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="Admin" value="0" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked"> Not Admin </label>
        </div>
        <button type="submit" class="btn btn-primary" name="update_user">Update User</button>
    </div>
    </form>




<?php include('footer.php'); ?>