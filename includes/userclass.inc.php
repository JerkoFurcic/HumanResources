<?php

require 'dbh.inc.php';

class User {

  static function isLoggedIn() {
    if (isset($_SESSION['userUid'])) {
      return $_SESSION['userUid'];
    }

    //check cookie

    if (isset($_COOKIE['loginKey']) and $_COOKIE['loginKey'] !== "") {
      
      $key = $_COOKIE['loginKey'];
      $key = htmlspecialchars($key);
      global $conn;
      $stmt = "SELECT userUid, userEmail FROM users WHERE loginKey = '$key' LIMIT 1";

      $stmt = $conn->query($stmt);

      if ($stmt->num_rows) {
        $stmt = $stmt->fetch_array()['userUid']||['userEmail'];
        return $stmt;
      }
    }
    return FALSE;
  }

  static function remember($email, $username) {

    global $conn;
    $randKey = random_bytes(8);
    $randKey = bin2hex($randKey);
    $stmt = "UPDATE users SET loginKey = ? WHERE userUid = ? OR userEmail = ?";

    $query = $conn->prepare($stmt);
    $query->bind_param('sss', $randKey, $email, $username);

    if ($query->execute()) {
      $next30days = (60 * 60 * 24 * 30);
      setcookie('loginKey', $randKey, time() + $next30days, "/");
    } else {
      echo "error";
    }
  } 
}