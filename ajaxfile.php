<?php

//ajax provjera dostupnosti username, email
require_once 'includes/dbh.inc.php';

if(isset($_POST["username"])){

   $username = $_POST["username"];

   $sql = "SELECT count(*) AS cntUser FROM users WHERE userUid='".$username."'";

   $result = mysqli_query($conn, $sql);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_assoc($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Not Available</span>";
      }
   }

   echo $response;
}

if(isset($_POST["email"])){

    $email = $_POST["email"];
 
    $sql = "SELECT count(*) AS cntUser FROM users WHERE userEmail='".$email."'";
 
    $result = mysqli_query($conn, $sql);
    $response = "<span style='color: green;'>Available.</span>";
    if(mysqli_num_rows($result)){
       $row = mysqli_fetch_assoc($result);
 
       $count = $row['cntUser'];
     
       if($count > 0){
           $response = "<span style='color: red;'>Not Available</span>";
       }
    }
 
    echo $response;
}

