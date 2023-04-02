<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "test";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$filename = 'backup.sql';
clearstatcache($filename);
$handle = fopen($filename, "r+");
$contents = fread($handle, filesize($filename));

$sql = explode(';', $contents);

foreach ($sql as $query) {
  $result = mysqli_query($conn, $query);
  if ($result) {
    echo '<tr><td><br></td></tr>';
    echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
    echo '<tr><td><br></td></tr>';
  }
}

fclose($handle);
echo "Successfuly imported!";

?>
