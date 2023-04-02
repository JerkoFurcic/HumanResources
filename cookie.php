<?php

$username = $_COOKIE['uid'] ?? '';
$password = $_COOKIE['pwd'] ?? '';

include 'dbh.inc.php';

$sql = "SELECT * FROM users WHERE userUid OR userEmail = '$username' AND userPwd = '$password';";

$result = mysqli_query($conn, $sql);

if (!$result) {
  
  header('location: login.php');
}
