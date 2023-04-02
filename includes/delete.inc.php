<?php
    require_once 'dbh.inc.php';

    $id=$_GET['id'];
    if (isset($_GET['id'])) {    
        
   
    $deleteOsobe = mysqli_query($conn, "DELETE FROM osoba WHERE osobaID = $id");
    header("location: ../tablice.php?deleted");
    $deleteUser = mysqli_query($conn, "DELETE FROM users WHERE userID = $id");
    header("location: ../adminpage.php?deleted");
    $deleteKategoriju = mysqli_query($conn, "DELETE FROM kategorije WHERE kategorijaID = $id");
    header("location: ../tablice.php?deleted");    
        
    }
    
    

    