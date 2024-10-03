<?php include('dbcon.php'); ?>
<?php include("session_include.php");?>
<?php 


         if(isset($_POST['Sign-In'])){
            $Email = $_POST['Email'];
            $password = $_POST['password'];
         }

         if (empty($Email)) {
            header("location:Admin_Sign_In.php?incorrect=Email is empty");
            exit();
        }
        
        if (empty($password)) {
            header("location:Admin_Sign_In.php?incorrect=Password is empty");
            exit();
        }

         $query = "select * from `admin` where `Email` = '$Email' and `Password` = '$password'";
         $result = mysqli_query($connection, $query);


         if(!$result){
            echo "query failed";
         }

         else{
            $row = mysqli_num_rows($result);

            if((int)$row == 1){
                $rows = mysqli_fetch_assoc($result);
               
                $_SESSION['Email'] = $rows['Email'];
                $_SESSION['id'] = $rows['id'];
                $_SESSION['cart'] = [];
                

                header("location:admin_panel.php");
                

                exit();
            }   
            else{
                header("location:Sign-in.php?incorrect=Incorrect Password or Email");
                exit();
            }
         }

     ?>