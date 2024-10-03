<?php
include ('dbcon.php');
require('session_include.php'); 

if(isset($_POST['Register'])){

   $Email = $_POST['Email'];
   $_SESSION['email_id'] = $Email;
   

   

  if((empty($Email))){
 
    header("Location:is-Guest-Form-Process.php?error=emptyfields");
   
        exit();
  }
  
  $query = "insert into `users` (`Email`) values ('$Email')";
  $result = mysqli_query($connection,$query);

  
  $query1 = "select `id` from `users` where `Email` = '$Email'";

  $result1 = mysqli_query($connection, $query1);

  $row1 = mysqli_fetch_assoc($result1);

  $id_user = $row1['id'];

  

  if(!$result){
    die("Query failed");
  }
  else{
    header('location:Guest-checkout.php');
  }




}











?>