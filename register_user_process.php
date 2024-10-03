<?php
include ('dbcon.php');
require('session_include.php'); 

if(isset($_POST['Register'])){

   $Email = $_POST['Email'];
   $Password = $_POST['Password'];
  
   

  if((empty($Email)) || empty($Password)){
 
    header("Location:register_user.php?error=emptyfields");
   
        exit();
  }
  
  $query = "insert into `users` (`Email`, `password`) values ('$Email', '$Password')";
  $result = mysqli_query($connection,$query);

  if(!$result){
    die("Query failed");
  }
  else{
    header('location:Sign-in.php');
  }




}