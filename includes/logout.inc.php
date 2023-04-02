<?php

// include_once 'dbh.inc.php';
// include_once 'functions.inc.php';

// if (isset($_POST["submit"])) {
    
//   systemLogout($conn, $_SESSION['userUid'], $unixTimestamp, $dateTime);

//   session_start();
//   session_unset();
//   session_destroy();  

//   header("location: ../login.php");
//   exit();
// }
    $unixTimestamp = time();
    $dateTime = date('Y-m-d H:i:s');
    
function systemLogout($conn, $username, $unixTimestamp, $dateTime)
{
    $sql = "UPDATE sistemStatistics SET LogoutUnix = '$unixTimestamp', LogoutDateTime='$dateTime' WHERE username = '$username' ORDER BY id DESC LIMIT 1;";
    require_once 'dbh.inc.php';
    $conn->query($sql);
}



session_start();
session_unset();
session_destroy();

systemLogout($conn, $username, $unixTimestamp, $dateTime);

header("location: ../login.php");
exit(); 