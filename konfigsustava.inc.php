<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsistem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


// SYSTEM CHANGE
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlPage = "SELECT * FROM konfiguracija WHERE type = 'Page number'";
$resultPage = mysqli_query($conn, $sqlPage);

if (mysqli_num_rows($resultPage) > 0) {
  while ($row = mysqli_fetch_assoc($resultPage)) {
      $pagination = $row['value'];
  }
}

$sqlCookie = "SELECT * FROM konfiguracija WHERE type = 'Cookie time'";
$resultCookie = mysqli_query($conn, $sqlCookie);

if (mysqli_num_rows($resultCookie) > 0) {
    while ($row = mysqli_fetch_assoc($resultCookie)) {
        $cookie = $row['value'];
    }
}

if (isset($_POST['submit'])) {

  $valuePage = $_POST['page'];
  $valueCookie = $_POST['cookietime'];

  if ($valuePage < 1 || $valueCookie <1 ) {
    header("location: konfiguracija.php?error=invalidinput");
    exit();
  } 

  if (!is_numeric($valuePage) || !is_numeric($valueCookie)) {
    header("location: konfiguracija.php?error=invalidinput");
    exit();
  }

  if ($valuePage != $pagination) {
    $sqlPageUpdate = "UPDATE konfiguracija SET value ='$valuePage' WHERE type = 'Page number'";
    $result = mysqli_query($conn, $sqlPageUpdate);
  }

  if ($valueCookie != $cookie) {
    $sqlCookieUpdate = "UPDATE konfiguracija SET value ='$valueCookie' WHERE type = 'Cookie time';";
    $result = mysqli_query($conn, $sqlCookieUpdate);
  }

  header("location: konfiguracija.php?error=none");
  exit();
}

