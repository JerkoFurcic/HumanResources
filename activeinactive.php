<?php

require_once 'includes/dbh.inc.php';

$query = mysqli_query($conn, "UPDATE users SET userStatus = '".$_POST['val']."' 
      WHERE userID = '".$_POST['userID']."'");

if ($query) {
  $q = mysqli_query($conn, "SELECT * FROM users WHERE userID = '".$_POST['userID']."'");
  $data = mysqli_fetch_assoc($query);

  echo $data['userStatus'];
}

?>  